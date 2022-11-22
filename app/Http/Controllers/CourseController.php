<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\StudyProgram;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::get();
        return view('courses.index',[
            'courses' => $courses
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $studyPrograms = StudyProgram::get();
        $userCreator = User::get();

        return view('courses.create', [
            'studyPrograms' => $studyPrograms,
            'userCreator' => $userCreator
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
        //
        $validated = $request->validate([
            'code' => 'required|string',
            'name' => 'required|string',
            'course_credit' => 'required|integer',
            'lab_credit' => 'required|integer',
            'type' => 'in:Mandatory,Elective',
            'short_description' => 'string',
            'minimal_requirement' => 'string',
            'study_material_summary' => 'string',
            'learning_media' => 'string',
            'study_program' => 'required|exists:study_programs,id',
            'creator_user' => 'required|exists:users,id'
        ]);

        // dd($request);

        $course = new Course();
        $course->code = $validated['code'];
        $course->name = $validated['name'];
        $course->course_credit = $validated['course_credit'];
        $course->lab_credit = $validated['lab_credit'];
        $course->type = $validated['type'];
        $course->short_description = $validated['short_description'];
        $course->minimal_requirement = $validated['minimal_requirement'];
        $course->study_material_summary = $validated['study_material_summary'];
        $course->learning_media = $validated['learning_media'];
        $course->study_program_id = $validated['study_program'];
        $course->creator_user_id = $validated['creator_user'];

        $course->save();

        return redirect()->route('courses.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course){
        //
        return view('courses.show', [
            'course' => $course
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $studyProgram = StudyProgram::where('id','=',$course->id)->first();
//        dd($studyProgram);
        return view('courses.edit',[
            'course' => $course,
            'studyProgram' => $studyProgram
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'code' => 'required|string',
            'name' => 'required|string',
            'course_credit' => 'required|integer',
            'lab_credit' => 'required|integer',
            'type' => 'required|in:Mandatory,Elective',
            'short_description' => 'required|text',
            'minimal_requirement' => 'required|string',
            'study_material_summary' => 'required|text',
            'learning_media' => 'required|text',
            'study_program' => 'required|exists:study_programs,id',
            'creator_user' => 'required|exists:users,id'
        ]);

        $course->update($validated);

        return redirect(route('courses.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}

