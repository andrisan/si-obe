<?php

namespace App\Http\Controllers;

use App\Models\Syllabus;
use App\Models\IntendedLearningOutcome;
use App\Models\CourseLearningOutcome;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class CourseLearningOutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clos = DB::table('course_learning_outcomes')->get();

        return view('course-learning-outcomes.index', [
            'clos' => $clos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course-learning-outcomes.create');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $intendedLearningOutcome
     * @param CourseLearningOutcome $courseLearningOutcome
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Syllabus $syllabus, IntendedLearningOutcome $intendedLearningOutcome, CourseLearningOutcome $courseLearningOutcome)
    {
        return view('course-learning-outcomes.edit', [
            'syllabus' => $syllabus,
            'intendedLearningOutcome' => $intendedLearningOutcome,
            'courseLearningOutcome' => $courseLearningOutcome,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $intendedLearningOutcome
     * @param CourseLearningOutcome $courseLearningOutcome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Syllabus $syllabus, IntendedLearningOutcome $intendedLearningOutcome, CourseLearningOutcome $courseLearningOutcome): RedirectResponse
    {
        $validated = $request->validate([
            'position' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $courseLearningOutcome->update($validated);

        return redirect()->route('syllabi.ilos.clos.index');
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
