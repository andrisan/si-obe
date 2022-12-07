<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\StudentGrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\CriteriaLevel;

class StudentGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $listStudents = Assignment::where('id', $request->assignment_id)->get();
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

                // debug manual
                // $cek = $ls->id === $sg->student_user_id;
                // echo "$ls->id === $sg->student_user_id $cek <br>";

                if ($ls->id === $sg->student_user_id) {
                    $ls->nilai = $sg->nilai;
                    $ls->btnCek = true;
                    break;
                }
                // else {
                //     $ls->nilai = 0;
                //     $ls->btnCek = false;
                // }
            }
        }
        // dd($studentGrades, $listStudents);

        return view('student-grades.index', [
            'listStudents' => $listStudents,
            'studentGrades' => $studentGrades
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('student-grades.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
//        dd($request);
        $grade = StudentGrade
            ::where('assignment_id',$request->assignment_id)
            ->where('student_user_id',$request->user_id)
            ->first();
        $criterias = CriteriaLevel::where('criteria_id','=',$grade->assignmentPlanTask->criteria_id)->get();
//        dd($grade);
        // dd($id);
        // dd($grade->assignmentPlanTask->criteria_id);
        // dd($criteria);
        return view('student-grades.edit', [
            'grade' => $grade,
            'criterias' => $criterias,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request);
        $grade = StudentGrade::find($id);

//        dd($request->all());

        $grade->criteria_level_id = $request->criteria_level_id;

        $grade->update();

        return view('student-grades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
