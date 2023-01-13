<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\CourseClass;
use App\Models\StudentGrade;
use App\Models\StudentGradeDetail;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class StudentGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function index(Request $request, CourseClass $class, Assignment $assignment)
    {
        $assignment->load('assignmentPlan.assignmentPlanTasks.criteria');

        $studentGradesQuery = $assignment->studentGrades()
            ->withSum(['studentGradeDetails as total_grade' => function($query){
                $query
                    ->join('criteria_levels', 'criteria_levels.id', '=', 'student_grade_details.criteria_level_id')
                    ->select(DB::raw('sum(point)'));
            }], 'point')->getQuery();

        $studentWithGrades = $class->students()
            ->leftJoinSub($studentGradesQuery, 'student_grades', function($join) {
                $join->on('join_classes.student_user_id', '=', 'student_grades.student_user_id');
            })
            ->select('users.*',
                'student_grades.id as student_grade_id',
                'student_grades.assignment_id',
                'student_grades.total_grade')
            ->with('studentData')
            ->get();

        $criteriaMaxPoint = $assignment->assignmentPlan->assignmentPlanTasks->sum('criteria.max_point');

        return view('student-grades.index', [
            'courseClass' => $class,
            'assignment' => $assignment,
            'studentWithGrades' => $studentWithGrades,
            'maxPoint' => $criteriaMaxPoint,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create(Request $request, CourseClass $class, Assignment $assignment)
    {
        $student = User::findOrFail($request->get('std'));

        $this->authorize('create', [StudentGrade::class, $assignment, $student]);

        return view('student-grades.create', [
            'courseClass' => $class,
            'assignment' => $assignment,
            'apts' => $assignment->assignmentPlan->assignmentPlanTasks,
            'student' => $student,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param CourseClass $class
     * @param Assignment $assignment
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Request $request, CourseClass $class, Assignment $assignment)
    {
        $student = User::findOrFail($request->post('std'));

        $this->authorize('create', [StudentGrade::class, $assignment, $student]);

        $apts = $assignment->assignmentPlan->assignmentPlanTasks;

        $studentGrade = new StudentGrade();
        $studentGrade->student_user_id = $student->id;
        $studentGrade->assignment_id = $assignment->id;
        $studentGrade->published = false;
        $studentGrade->save();

        $i = 0;
        foreach ($apts as $apt) {
            if ($request->input("criteria_level_id$i")) {
                $studentGradeDetail = new StudentGradeDetail();
                $studentGradeDetail->student_grade_id = $studentGrade->id;
                $studentGradeDetail->assignment_plan_task_id = $apt->id;
                $studentGradeDetail->criteria_level_id = $request->input("criteria_level_id$i");
                $studentGradeDetail->save();
            }
            $i++;
        }

        return redirect()->route('classes.assignments.student-grades.index', [$class, $assignment]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param CourseClass $class
     * @param Assignment $assignment
     * @param StudentGrade $studentGrade
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(Request $request, CourseClass $class, Assignment $assignment, StudentGrade $studentGrade)
    {
        $student = $studentGrade->student;

        $this->authorize('update', [StudentGrade::class, $assignment, $student]);

        $assignment->load('assignmentPlan.assignmentPlanTasks.criteria.criteriaLevels');

        $apts = $assignment->assignmentPlan->assignmentPlanTasks;

        return view('student-grades.edit', [
            'courseClass' => $class,
            'studentGrade' => $studentGrade,
            'apts' => $apts,
            'assignment' => $assignment,
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, CourseClass $class, Assignment $assignment, StudentGrade $studentGrade)
    {
        $student = User::findOrFail($request->post('std'));

        $this->authorize('update', [StudentGrade::class, $assignment, $student]);

        $apts = $assignment->assignmentPlan->assignmentPlanTasks;

        $i = 0;
        foreach ($apts as $apt) {
            $gradeDetail = $studentGrade->studentGradeDetails->where('assignment_plan_task_id',$apt->id)->first();
            if ($gradeDetail) {
                $gradeDetail->criteria_level_id = $request->input("criteria_level_id$i");
                $gradeDetail->update();
            } elseif ($request->input("criteria_level_id$i")) {
                $gradeDetail = new StudentGradeDetail();
                $gradeDetail->student_grade_id = $studentGrade->id;
                $gradeDetail->assignment_plan_task_id = $apt->id;
                $gradeDetail->criteria_level_id = $request->input("criteria_level_id$i");
                $gradeDetail->save();
            }
            $i++;
        }

        return redirect()->route('classes.assignments.student-grades.index', [$class, $assignment]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param CourseClass $class
     * @param Assignment $assignment
     * @param StudentGrade $studentGrade
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Request $request, CourseClass $class, Assignment $assignment, StudentGrade $studentGrade)
    {
        $student = User::findOrFail($request->post('student_id'));

        $this->authorize('delete', [StudentGrade::class, $assignment, $student]);

        $studentGrade->load('studentGradeDetails');

        foreach ($studentGrade->studentGradeDetails as $gradeDetail) {
            $gradeDetail->delete();
        }

        $studentGrade->delete();

        return back();
    }
}
