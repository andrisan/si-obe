<?php

namespace App\Http\Controllers;

use App\Models\IntendedLearningOutcome;
use App\Models\Syllabus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $ilo
     * @param CourseLearningOutcome $clo
     * @return Application|Factory|View
     */
    public function create(Syllabus $syllabus, IntendedLearningOutcome $ilo, CourseLearningOutcome $clo)
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
     * @param Request $request
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $ilo
     * @param CourseLearningOutcome $clo
     * @return RedirectResponse
     */
    public function store(Request $request, Syllabus $syllabus, IntendedLearningOutcome $ilo, CourseLearningOutcome $clo)
    {
        $validated = $request->validate([
            'description' => 'required|string',
        ]);
        $newPosition = $clo->lessonLearningOutcomes()->max('position') + 1;
        $validated['position'] = $newPosition;

        $clo->lessonLearningOutcomes()->create($validated);

        return redirect()->route('syllabi.ilos.clos.llos.index',[
            'syllabus' => $syllabus,
            'ilo' => $ilo,
            'clo' => $clo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $ilo
     * @param CourseLearningOutcome $clo
     * @param LessonLearningOutcome $llo
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Syllabus $syllabus, IntendedLearningOutcome $ilo, CourseLearningOutcome $clo, LessonLearningOutcome $llo)
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
     * @param Request $request
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $ilo
     * @param CourseLearningOutcome $clo
     * @param LessonLearningOutcome $llo
     * @return RedirectResponse
     */
    public function update(Request $request, Syllabus $syllabus, IntendedLearningOutcome $ilo, CourseLearningOutcome $clo, LessonLearningOutcome $llo)
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
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $ilo
     * @param CourseLearningOutcome $clo
     * @param LessonLearningOutcome $llo
     * @return RedirectResponse
     */
    public function destroy(Syllabus $syllabus, IntendedLearningOutcome $ilo, CourseLearningOutcome $clo, LessonLearningOutcome $llo)
    {
        $llo->delete();
        return back();
    }
}
