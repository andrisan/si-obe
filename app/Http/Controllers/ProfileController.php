<?php

namespace App\Http\Controllers;

use App\Models\LessonLearningOutcome;
use App\Models\StudentData;
use App\Models\StudentGrade;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return Application|Factory|View
     */
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', ['user'=> $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function create()
    {
        if (Auth::user()->role != 'student') {
            return redirect()->route('dashboard');
        }

        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id_number' => 'required|numeric',
        ]);

        $studentData = StudentData::where('id', Auth::user()->id)->first();
        if ($studentData == null){
            $studentData = new StudentData();
            $studentData->id = Auth::id();
        }
        $studentData->student_id_number = $validated['student_id_number'];
        $studentData->save();

        $user = Auth::user();
        $user->profile_completed = true;
        $user->save();

        return redirect()->route('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View
     */
    public function edit()
    {
        $user = Auth::user();
        if ($user->role == 'student'){
            $studentData = $user->studentData;
            return view('profile.edit_student', ['user'=> $user, 'studentData' => $studentData]);
        }

        return view('profile.edit', ['user'=> $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        if ($user->role == 'student'){
            $validated = $request->validate([
                'name' => 'required|string',
                'student_id_number' => 'required|numeric',
            ]);

            $studentData = $user->studentData;
            if ($studentData == null){
                $studentData = new StudentData();
                $studentData->id = Auth::id();
            }
            $studentData->student_id_number = $validated['student_id_number'];
            $studentData->save();
        } else {
            $validated = $request->validate([
                'name' => 'required|string',
            ]);
        }

        $user->name = $validated['name'];
        $user->save();

        return redirect()->route('profile.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function destroy()
    {
        abort(403);
    }

    public function grade()
    {
        $user = User::with(
            'joinedClasses.syllabus.lessonLearningOutcomes',
            'joinedClasses.course','joinedClasses.assignments.studentGrades.criteriaLevel.criteria',
            'joinedClasses.assignments.assignmentPlan')
            ->findOrFail(Auth::id());

        $userClassesGrade = $user->joinedClasses;

        $perAssignmentGrades = StudentGrade::select('assignments.course_class_id', DB::raw('SUM(criteria_levels.point) as point'))
            ->join('assignments', 'student_grades.assignment_id', '=', 'assignments.id')
            ->join('criteria_levels', 'student_grades.criteria_level_id', '=', 'criteria_levels.id')
            ->groupBy('assignments.course_class_id')
            ->where('student_user_id', $user->id)
            ->get();

        $perLloGrades = StudentGrade::select('assignments.course_class_id', 'criterias.llo_id', DB::raw('SUM(criteria_levels.point) as student_point'), DB::raw('SUM(criterias.max_point) as max_llo_point'))
            ->join('assignments', 'student_grades.assignment_id', '=', 'assignments.id')
            ->join('criteria_levels', 'student_grades.criteria_level_id', '=', 'criteria_levels.id')
            ->join('criterias', 'criteria_levels.criteria_id', '=', 'criterias.id')
            ->join('lesson_learning_outcomes', 'criterias.llo_id', '=', 'lesson_learning_outcomes.id')
            ->where('student_user_id', $user->id)
            ->groupBy('assignments.course_class_id', 'criterias.llo_id')
            ->get();

        foreach ($userClassesGrade as $classGrade){
            $perAssignmentGrade = $perAssignmentGrades->filter(function ($grade) use ($classGrade) {
                return $grade->course_class_id == $classGrade->id;
            })->first();

            if ($perAssignmentGrade != null) {
                $perAssignmentGrade->letterGrade = $this->_getLetterGrade($perAssignmentGrade->point ?? 0);
            }
            $classGrade->userGrade = $perAssignmentGrade;

            // per assignment grade
            $ungradedAssignmentCount = 0;
            $classAssignments = $classGrade->assignments;
            foreach ($classAssignments as $assignment) {
                $point = 0; $maxPoint = 0;
                foreach ($assignment->studentGrades as $stud) {
                    if ($stud->student_user_id != $user->id) {
                        continue;
                    }
                    $point += $stud->criteriaLevel->point;
                    $maxPoint += $stud->criteriaLevel->criteria->max_point;
                }
                if ($maxPoint == 0) {
                    $ungradedAssignmentCount++;
                }
                $assignment->perAssignmentGrade = $maxPoint == 0 ?
                    $maxPoint :
                    round($point / $maxPoint * 100, 2);
            }
            $gradedAssignmentCount = $classAssignments->count() - $ungradedAssignmentCount;
            $classGrade->gradingProgress = $classAssignments->count() == 0 ?
                0 : round($gradedAssignmentCount / $classAssignments->count() * 100, 2);

            // per LLO grade
            $perLloGrade = $perLloGrades->filter(function ($grade) use ($classGrade) {
                return $grade->course_class_id == $classGrade->id;
            });

            $classLLOs = $classGrade->syllabus->lessonLearningOutcomes;
            foreach ($classLLOs as $llo) {
                $lloGrade = $perLloGrade->filter(function ($grade) use ($llo) {
                    return $grade->llo_id == $llo->id;
                })->first();
                $llo->perLLOGrade = $lloGrade == null ? 0 : round($lloGrade->student_point / $lloGrade->max_llo_point * 100, 2);
            }
        }

        return view('profile.grade', [
            'user'=> $user,
            'userClassesGrade' => $userClassesGrade
        ]);
    }

    public function _getLetterGrade($point)
    {
        if ($point > 80) {
            return 'A';
        } elseif ($point > 75) {
            return 'B+';
        } elseif ($point > 69) {
            return 'B';
        } elseif ($point > 60) {
            return 'C+';
        } elseif ($point > 55) {
            return 'C';
        } elseif ($point > 50) {
            return 'D+';
        } elseif ($point > 44) {
            return 'D';
        } else {
            return 'E';
        }
    }
}
