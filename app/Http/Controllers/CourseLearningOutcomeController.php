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
    public function index($syllabus, $ilo)
    {
        $data = CourseLearningOutcome::all();

        return view('course-learning-outcomes.index', [
            'data' => $data
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
    public function edit($syllabus, $ilo, CourseLearningOutcome $clo)
    {
        return view('course-learning-outcomes.edit', [
            'syllabus' => $syllabus,
            'ilo' => $ilo,
            'clo' => $clo,
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
    public function update(Request $request, $syllabus, $ilo, CourseLearningOutcome $clo): RedirectResponse
    {
        $validated = $request->validate([
            'position' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $clo->update($validated);

        return redirect()->route('syllabi.ilos.clos.index', [
            'syllabus' => $syllabus,
            'ilo' => $ilo,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($syllabus, $ilo, CourseLearningOutcome $clo)
    {
        //
        $clo->delete();

        return redirect(route('syllabi.ilos.clos.index', [$syllabus, $ilo]));
    }
}
