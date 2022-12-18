<?php

namespace App\Http\Controllers;

use App\Models\IntendedLearningOutcome;
use App\Models\Syllabus;
use Illuminate\Http\Request;
use App\Models\CourseLearningOutcome;
use App\Models\LessonLearningOutcome;

class LessonLearningOutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Syllabus $syllabus, IntendedLearningOutcome $ilo, CourseLearningOutcome $clo)
    {
        return view('lesson-learning-outcomes.index', [
            'syllabus' => $syllabus,
            'ilo' => $ilo,
            'clo' => $clo,
            'llos' => $clo->lessonLearningOutcomes()->orderBy('position')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($syllabus, $ilo, CourseLearningOutcome $clo)
    {
        return view('lesson-learning-outcomes.create',[
            'syllabus' => $syllabus,
            'ilo' => $ilo,
            'clo' => $clo
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $syllabus, $ilo, CourseLearningOutcome $clo)
    {
        $validated = $request->validate([
            'position' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $clo->lessonLearningOutcomes()->create($validated);

        return redirect()->route('syllabi.ilos.clos.llos.index',[
            'syllabus' => $syllabus,
            'ilo' => $ilo,
            'clo' => $clo
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($syllabus, $ilo, $clo, LessonLearningOutcome $llo)
    {
        return view('lesson-learning-outcomes.edit', [
            'syllabus' => $syllabus,
            'ilo' => $ilo,
            'clo' => $clo,
            'llo' => $llo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $syllabus, $ilo, $clo, LessonLearningOutcome $llo)
    {
        $validated = $request->validate([
            'position' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $llo->update($validated);

        return redirect()->route('syllabi.ilos.clos.llos.index',[
            'syllabus' => $syllabus,
            'ilo' => $ilo,
            'clo' => $clo
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($syllabus, $ilo, $clo, LessonLearningOutcome $llo)
    {
        $llo->delete();

        return redirect()->route('syllabi.ilos.clos.llos.index',[
            'syllabus' => $syllabus,
            'ilo' => $ilo,
            'clo' => $clo
        ]);
    }
}
