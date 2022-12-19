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
        $assignment = Assignment::with('assignmentPlan', 'courseClass')->find($assignmentId);
        if (empty($assignment)) {
            abort(404);
        }

        $listStudents = DB::table('assignments')
            ->select(DB::raw('assignments.id as idAssignment, users.id,
                            student_data.student_id_number as nim, users.name as namaMhs, course_classes.name as kelas'))
            ->join('course_classes', 'course_classes.id', '=', 'assignments.course_class_id')
            ->join('join_classes', 'join_classes.course_class_id', '=', 'course_classes.id')
            ->join('users', 'users.id', '=', 'join_classes.student_user_id')
            ->join('student_data', 'student_data.id', '=', 'users.id')
            ->where('assignments.id', '=', $request->assignment_id)
            ->get();

        $studentGrades = DB::table('student_grades')
            ->select(DB::raw('student_grades.student_user_id, sum(criteria_levels.`point`) as nilai'))
            ->join('criteria_levels', 'criteria_levels.id', '=', 'student_grades.criteria_level_id')
            ->where('assignment_id', '=', $request->assignment_id)
            ->groupBy('student_grades.student_user_id')
            ->get();


        foreach ($listStudents as $ls) {
            foreach ($studentGrades as $sg) {
                if ($ls->id === $sg->student_user_id) {
                    $ls->nilai = $sg->nilai;
                    $ls->btnCek = true;
                    break;
                }
            }
        }

        return view('student-grades.index', [
            'listStudents' => $listStudents,
            'studentGrades' => $studentGrades,
            'assignment' => $assignment,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $assignmentid = $request->query('assignment_id');
        $userid = $request->query('user_id');
        $username = User::where('id', $userid)->first();
        $assignment = Assignment::where('id', $assignmentid)->first();
        $plantasks = AssignmentPlanTask::get();
        $criterialevels = CriteriaLevel::get();
        return view('student-grades.create', [
            'username' => $username->name,
            'assignment' => $assignment->note,
            'assignmentid' => $assignmentid,
            'userid' => $userid,
            'plantasks' => $plantasks,
            'criterialevels' => $criterialevels
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assignmentid = $request->assignment_id;
        $studentid = $request->student_user_id;
        $plan1 = $request->assignment_plan_task_id;
        $criteria1 = $request->criteria_level_id;
        $plan2 = $request->assignment_plan_task_id2;
        $criteria2 = $request->criteria_level_id2;

        $data = [
            ['student_user_id' => $studentid,
            'assignment_id' => $assignmentid,
            'assignment_plan_task_id' => $plan1,
            'criteria_level_id' => $criteria1],
            ['student_user_id' => $studentid,
            'assignment_id' => $assignmentid,
            'assignment_plan_task_id' => $plan2,
            'criteria_level_id' => $criteria2]
        ];

        StudentGrade::insert($data); // Eloquent approach

        return redirect('/student-grades/?assignment_id='.$assignmentid);
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
        $assignment = Assignment::with('assignmentPlan', 'assignmentPlan.assignmentPlanTasks')->find($assignmentId);
        if (empty($assignment)) {
            abort(404);
        }

        $userId = $request->query('user_id');
        $user = User::where('id', $userId)->first();
        if (empty($user)) {
            abort(404);
        }

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
        $assignment = Assignment::with('assignmentPlan', 'assignmentPlan.assignmentPlanTasks')->find($assignmentId);
        if (empty($assignment)) {
            abort(404);
        }

        $userId = $request->post('user_id');
        $user = User::where('id', $userId)->first();
        if (empty($user)) {
            abort(404);
        }

        $grades = StudentGrade
            ::where('assignment_id', $assignmentId)
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

        return redirect('/student-grades/?assignment_id='.$request->assignment_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $grades = StudentGrade::where('assignment_id', $request->assignmentId)->where('student_user_id', $request->userId)->get();
        foreach($grades as $grade){
            $grade->delete();
        }

        // dd($grade);
        return redirect('/student-grades/?assignment_id='.$request->assignmentId);
    }
}
