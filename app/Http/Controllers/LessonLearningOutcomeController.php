<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\IntendedLearningOutcome;
use App\Models\CourseLearningOutcome;
use App\Models\LessonLearningOutcome;

class LessonLearningOutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($syllabus, $ilo, $clo)
    {
        $clos = LessonLearningOutcome::where('id', $clo)->get();
        $llos = LessonLearningOutcome::where('clo_id', $clo)->get();

        return view('lesson-learning-outcomes.index', [
            'syllabus' => $syllabus,
            'ilo' => $ilo,
            'clos' => $clos,
            'llos' => $llos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lesson-learning-outcomes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|id',
            'clo_id' => 'required|id',
            'position' => 'integer',
            'description' => 'text',
        ]);

        $llo = new LessonLearningOutcome();
        $llo->id = $validated['id'];
        $llo->clo_id = $validated['clo_id'];
        $llo->position = $validated['position'];
        $llo->description = $validated['description'];
        $llo->save();

        return redirect()->route('lesson-learning-outcomes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(IntendedLearningOutcome $intendedLearningOutcome, CourseLearningOutcome $courseLearningOutcome, LessonLearningProgram $lessonLearningProgram)
    {
        ddd($intendedLearningOutcome, $courseLearningOutcome, $lessonLearningProgram);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($syllabus, $ilo, $clo, $llo)
    {
        return view('lesson-learning-outcomes.edit', [
            'clo' => $clo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $syllabus, $ilo, $clo, $llo)
    {
        $validated = $request->validate([
            'id' => 'required|id',
            'clo_id' => 'required|id',
            'position' => 'integer',
            'description' => 'text',
        ]);

        $llo->update($validated);

        return redirect(route('lesson-learning-outcomes.index'));
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
