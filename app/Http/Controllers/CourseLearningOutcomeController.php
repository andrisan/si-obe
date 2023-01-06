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
    public function index()
    {
        abort(404);
    }

    public function show()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Syllabus $syllabus
     * @return Application|Factory|View
     */
    public function create(Syllabus $syllabus)
    {
        $this->authorize('create', [CourseLearningOutcome::class, $syllabus]);

        return view('course-learning-outcomes.create', [
            'syllabus' => $syllabus,
            'ilos' => IntendedLearningOutcome::where('syllabus_id', $syllabus->id)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Syllabus $syllabus
     * @return RedirectResponse
     */
    public function store(Request $request, Syllabus $syllabus)
    {
        $this->authorize('create', [CourseLearningOutcome::class, $syllabus]);

        $validated = $request->validate([
            'code' => 'nullable|string|max:255',
            'ilo_id' => 'nullable|exists:intended_learning_outcomes,id',
            'description' => 'required|string',
        ]);
        $newPosition = $syllabus->courseLearningOutcomes()->max('position') + 1;
        $validated['position'] = $newPosition;

        $syllabus->courseLearningOutcomes()->create($validated);

        return redirect()->route('syllabi.show', $syllabus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Syllabus $syllabus
     * @param CourseLearningOutcome $clo
     * @return Application|Factory|View
     */
    public function edit(Syllabus $syllabus, CourseLearningOutcome $clo)
    {
        $this->authorize('update', $clo);

        return view('course-learning-outcomes.edit', [
            'syllabus' => $syllabus,
            'clo' => $clo,
            'ilos' => IntendedLearningOutcome::where('syllabus_id', $syllabus->id)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Syllabus $syllabus
     * @param CourseLearningOutcome $clo
     * @return RedirectResponse
     */
    public function update(Request $request, Syllabus $syllabus, CourseLearningOutcome $clo): RedirectResponse
    {
        $this->authorize('update', $clo);

        $validated = $request->validate([
            'ilo_id' => 'nullable|exists:intended_learning_outcomes,id',
            'code' => 'nullable|string|max:255',
            'position' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $clo->update($validated);

        return redirect()->route('syllabi.show', $syllabus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Syllabus $syllabus
     * @param CourseLearningOutcome $clo
     * @return RedirectResponse
     */
    public function destroy(Syllabus $syllabus, CourseLearningOutcome $clo)
    {
        $this->authorize('delete', $clo);

        $clo->delete();
        return back();
    }
}
