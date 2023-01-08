<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\StudentGrade;
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
    public function index(Request $request)
    {
        $assignmentId = $request->get('assignment_id');
        $assignment = Assignment::findOrFail($assignmentId);

        $this->authorize('viewAny', [StudentGrade::class, $assignment->courseClass]);

        $criteriaMaxPoint = 0;
        foreach ($assignment->assignmentPlan->assignmentPlanTasks as $assignmentPlanTask) {
            $criteriaMaxPoint += $assignmentPlanTask->criteria->max_point;
        }

        $courseClassId = $assignment->courseClass->id;

        $studentGrades = DB::select("select u.id as student_user_id, sd.student_id_number, u.name, grade.total_student_point
                    from join_classes jc
                    join users u on u.id  = jc.student_user_id
                    left join student_data sd on sd.id = u.id
                    left join (
                        select student_user_id, sum(student_point) as total_student_point
                        from (
                            select sg.student_user_id, sum(cl.`point`) as student_point
                                from student_grades sg
                                join `assignments` a on a.id = sg.assignment_id
                                join criteria_levels cl on cl.id = sg.criteria_level_id
                                where a.course_class_id = $courseClassId and assignment_id = $assignmentId
                                group by sg.student_user_id
                        ) grade_llo
                        group by student_user_id
                    ) grade on grade.student_user_id = u.id
                    where jc.course_class_id = $courseClassId
                ");

        return view('student-grades.index', [
            'studentGrades' => $studentGrades,
            'assignment' => $assignment,
            'maxPoint' => $criteriaMaxPoint
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create(Request $request)
    {
        $assignment = Assignment::findOrFail($request->get('assignment_id'));
        $student = User::findOrFail($request->get('student_id'));

        $this->authorize('create', [StudentGrade::class, $assignment, $student]);

        return view('student-grades.create', [
            'assignment' => $assignment,
            'apts' => $assignment->assignmentPlan->assignmentPlanTasks,
            'student' => $student,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {
        $assignment = Assignment::findOrFail($request->post('assignment_id'));
        $student = User::findOrFail($request->post('student_id'));

        $this->authorize('create', [StudentGrade::class, $assignment, $student]);

        $apts = $assignment->assignmentPlan->assignmentPlanTasks;

        $i = 0;
        foreach ($apts as $apt) {
            if ($request->input("criteria_level_id$i")) {
                $grade = new StudentGrade();
                $grade->student_user_id = $student->id;
                $grade->assignment_id = $assignment->id;
                $grade->assignment_plan_task_id = $apt->id;
                $grade->criteria_level_id = $request->input("criteria_level_id$i");
                $grade->save();
            }
            $i++;
        }

        return redirect()->route('student-grades.index', ['assignment_id' => $assignment->id]);
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
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(Request $request)
    {
        $assignment = Assignment::findOrFail($request->get('assignment_id'));
        $student = User::findOrFail($request->query('student_id'));

        $this->authorize('update', [StudentGrade::class, $assignment, $student]);

        $grades = StudentGrade::where('assignment_id', $assignment->id)
            ->where('student_user_id', $student->id)
            ->get();

        $apts = $assignment->assignmentPlan->assignmentPlanTasks;

        return view('student-grades.edit', [
            'grades' => $grades,
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
    public function update(Request $request)
    {
        $assignment = Assignment::findOrFail($request->post('assignment_id'));
        $student = User::findOrFail($request->post('student_id'));

        $this->authorize('update', [StudentGrade::class, $assignment, $student]);

        $grades = StudentGrade::where('assignment_id', $assignment->id)
            ->where('student_user_id', $student->id)
            ->get();

        $apts = $assignment->assignmentPlan->assignmentPlanTasks;

        $i = 0;
        foreach ($apts as $apt) {
            $grade = $grades->where('assignment_plan_task_id',$apt->id)->first();
            if ($grade) {
                $grade->criteria_level_id = $request->input("criteria_level_id$i");
                $grade->update();
            } elseif ($request->input("criteria_level_id$i")) {
                $grade = new StudentGrade();
                $grade->student_user_id = $student->id;
                $grade->assignment_id = $request->assignment_id;
                $grade->assignment_plan_task_id = $apt->id;
                $grade->criteria_level_id = $request->input("criteria_level_id$i");
                $grade->save();
            }
            $i++;
        }

        return redirect()->route('student-grades.index', ['assignment_id' => $assignment->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Request $request)
    {
        $assignment = Assignment::findOrFail($request->post('assignment_id'));
        $student = User::findOrFail($request->post('student_id'));

        $this->authorize('delete', [StudentGrade::class, $assignment, $student]);

        $grades = StudentGrade::where([
            ['assignment_id', '=', $assignment->id],
            ['student_user_id', '=', $student->id],
        ])->get();

        if (empty($grades)) {
            abort(404);
        }

        foreach($grades as $grade){
            $grade->delete();
        }

        return back();
    }
}
