<?php

namespace App\Http\Controllers;

use App\Models\Syllabus;
use App\Models\IntendedLearningOutcome;
use App\Models\CourseLearningOutcome;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CourseLearningOutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Syllabus $syllabus, IntendedLearningOutcome $ilo)
    {
        return view('course-learning-outcomes.index', [
            'syllabus' => $syllabus,
            'ilo' => $ilo,
            'clos' => $ilo->courseLearningOutcomes()->orderBy('position')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $ilo
     * @return Application|Factory|View
     */
    public function create(Syllabus $syllabus, IntendedLearningOutcome $ilo)
    {
        return view('course-learning-outcomes.create', [
            'syllabus' => $syllabus,
            'ilo' => $ilo,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $ilo
     * @return RedirectResponse
     */
    public function store(Request $request, Syllabus $syllabus, IntendedLearningOutcome $ilo)
    {
        $validated = $request->validate([
            'description' => 'required|string',
        ]);
        $newPosition = $ilo->courseLearningOutcomes()->max('position') + 1;
        $validated['position'] = $newPosition;

        $ilo->courseLearningOutcomes()->create($validated);

        return redirect()->route('syllabi.ilos.clos.index', [
            'syllabus' => $syllabus,
            'ilo' => $ilo,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $ilo
     * @param CourseLearningOutcome $clo
     * @return Application|Factory|View
     */
    public function edit(Syllabus $syllabus, IntendedLearningOutcome $ilo, CourseLearningOutcome $clo)
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
     * @param Request $request
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $ilo
     * @param CourseLearningOutcome $clo
     * @return RedirectResponse
     */
    public function update(Request $request, Syllabus $syllabus, IntendedLearningOutcome $ilo, CourseLearningOutcome $clo): RedirectResponse
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
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $ilo
     * @param CourseLearningOutcome $clo
     * @return RedirectResponse
     */
    public function destroy(Syllabus $syllabus, IntendedLearningOutcome $ilo, CourseLearningOutcome $clo)
    {
        $clo->delete();
        return back();
    }
}
