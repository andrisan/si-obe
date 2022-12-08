<?php

namespace App\Http\Controllers;

use App\Models\Syllabus;
use Illuminate\Http\Request;
use App\Models\Course;


class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $course = Course::all();
        $syllabi = Syllabus::all();
        return view('syllabi.index', [
            'course' => $course,
            'syllabus' => $syllabi


        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $course = Course::all();
        return view(
            'syllabi.create',
            [
                'course' => $course
            ]

        );
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
            'title' => 'required|string',
            'head_of_study_program' => 'required|string',
            'author'=> 'required|string'
        ]);
        $course = Course::where('title', $validated['title'])->get();

        $syllabus = new Syllabus();
        $syllabus->title = $validated['title'];
        $syllabus->title = $course->first()->id;
        $syllabus->save();
        return redirect()->route(
            'faculties.departments.index'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function show(Syllabus $syllabus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function edit(Syllabus $syllabus)
    {
        //
        return view(
            'syllabi.edit',
            [
                'syllabus' => $syllabus
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Syllabus $syllabus)
    {
        //
        $validate = $request->validate([
        'title'=>'required|string',
        'author'=>'required|string'
       ]);
       $syllabus->update([
        'title'=>$validate['title'],
        'author'=>$validate['author'],
       ]);
        return redirect()->route('syllabi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Syllabus $syllabus)
    {
        //
    }
}
