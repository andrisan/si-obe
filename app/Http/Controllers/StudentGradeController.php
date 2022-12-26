<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\StudentGrade;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\AssignmentPlanTask;
use App\Models\StudentData;
use App\Models\CriteriaLevel;
use App\Models\User;


class StudentGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $assignmentId = $request->get('assignment_id');
        $assignment = Assignment::with('assignmentPlan.rubric.criterias',
            'assignmentPlan.assignmentPlanTasks','courseClass.students')->findOrFail($assignmentId);

        $criteriaMaxPoint = 0;
        foreach ($assignment->assignmentPlan->assignmentPlanTasks as $assignmentPlanTask) {
            $criteriaMaxPoint += $assignmentPlanTask->criteria->max_point;
        }

        $courseClassID = $assignment->courseClass->id;

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
                                where a.course_class_id = $courseClassID and assignment_id = $assignmentId
                                group by sg.student_user_id
                        ) grade_llo
                        group by student_user_id
                    ) grade on grade.student_user_id = u.id
                    where jc.course_class_id = $courseClassID
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
     */
    public function create(Request $request)
    {
        $assignmentId = $request->get('assignment_id');
        $assignment = $this->_findOrFailAssignment($assignmentId);

        $userId = $request->query('user_id');
        $user = $this->_findOrFailUser($userId);

        return view('student-grades.create', [
            'assignment' => $assignment,
            'apts' => $assignment->assignmentPlan->assignmentPlanTasks,
            'user' => $user,
        ]);
    }

    public function _findOrFailAssignment($assignmentId)
    {
        return Assignment::with('assignmentPlan', 'assignmentPlan.assignmentPlanTasks')->findOrFail($assignmentId);
    }

    public function _findOrFailUser($userId)
    {
        $user = User::where('id', $userId)->first();
        if (empty($user)) {
            abort(404);
        }
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $assignmentId = $request->post('assignment_id');
        $assignment = $this->_findOrFailAssignment($assignmentId);

        $userId = $request->post('user_id');
        $user = $this->_findOrFailUser($userId);

        $apts = $assignment->assignmentPlan->assignmentPlanTasks;

        $i = 0;
        foreach ($apts as $apt) {
            if ($request->input("criteria_level_id$i")) {
                $grade = new StudentGrade();
                $grade->student_user_id = $user->id;
                $grade->assignment_id = $assignment->id;
                $grade->assignment_plan_task_id = $apt->id;
                $grade->criteria_level_id = $request->input("criteria_level_id$i");
                $grade->save();
            }
            $i++;
        }

        return redirect()->route('student-grades.index', ['assignment_id' => $assignmentId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     */
    public function edit(Request $request)
    {
        $assignmentId = $request->get('assignment_id');
        $assignment = $this->_findOrFailAssignment($assignmentId);

        $userId = $request->query('user_id');
        $user = $this->_findOrFailUser($userId);

        $grades = StudentGrade::where('assignment_id', $assignmentId)
            ->where('student_user_id', $userId)
            ->get();

        $apts = $assignment->assignmentPlan->assignmentPlanTasks;

        return view('student-grades.edit', [
            'grades' => $grades,
            'apts' => $apts,
            'assignment' => $assignment,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request)
    {
        $assignmentId = $request->post('assignment_id');
        $assignment = $this->_findOrFailAssignment($assignmentId);

        $userId = $request->post('user_id');
        $user = $this->_findOrFailUser($userId);

        $grades = StudentGrade::where('assignment_id', $assignmentId)
            ->where('student_user_id', $userId)
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
                $grade->student_user_id = $request->user_id;
                $grade->assignment_id = $request->assignment_id;
                $grade->assignment_plan_task_id = $apt->id;
                $grade->criteria_level_id = $request->input("criteria_level_id$i");
                $grade->save();
            }
            $i++;
        }

        return redirect()->route('student-grades.index', ['assignment_id' => $assignmentId]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        $assignmentId = $request->post('assignmentId');
        $grades = StudentGrade::where([
            ['assignment_id', '=', $assignmentId],
            ['student_user_id', '=', $request->post('userId')],
        ])->get();

        foreach($grades as $grade){
            $grade->delete();
        }

        return back();
    }
}
