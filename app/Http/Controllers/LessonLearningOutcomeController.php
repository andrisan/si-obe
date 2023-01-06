<?php

namespace App\Http\Controllers;

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
        $this->authorize('create', [LessonLearningOutcome::class, $syllabus]);

        return view('lesson-learning-outcomes.create',[
            'syllabus' => $syllabus,
            'clos' => CourseLearningOutcome::where('syllabus_id', $syllabus->id)->get(),
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
        $this->authorize('create', [LessonLearningOutcome::class, $syllabus]);

        $validated = $request->validate([
            'code' => 'nullable|string|max:255',
            'clo_id' => 'nullable|exists:course_learning_outcomes,id',
            'description' => 'required|string',
        ]);
        $newPosition = $syllabus->lessonLearningOutcomes()->max('position') + 1;
        $validated['position'] = $newPosition;

        $syllabus->lessonLearningOutcomes()->create($validated);

        return redirect()->route('syllabi.show', $syllabus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Syllabus $syllabus
     * @param LessonLearningOutcome $llo
     * @return Application|Factory|View
     */
    public function edit(Syllabus $syllabus, LessonLearningOutcome $llo)
    {
        $this->authorize('update', $llo);

        return view('lesson-learning-outcomes.edit', [
            'syllabus' => $syllabus,
            'llo' => $llo,
            'clos' => CourseLearningOutcome::where('syllabus_id', $syllabus->id)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Syllabus $syllabus
     * @param LessonLearningOutcome $llo
     * @return RedirectResponse
     */
    public function update(Request $request, Syllabus $syllabus, LessonLearningOutcome $llo)
    {
        $this->authorize('update', $llo);

        $validated = $request->validate([
            'code' => 'nullable|string|max:255',
            'clo_id' => 'nullable|exists:course_learning_outcomes,id',
            'position' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $llo->update($validated);

        return redirect()->route('syllabi.show', $syllabus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Syllabus $syllabus
     * @param LessonLearningOutcome $llo
     * @return RedirectResponse
     */
    public function destroy(Syllabus $syllabus, LessonLearningOutcome $llo)
    {
        $this->authorize('delete', $llo);

        $llo->delete();
        return back();
    }
}
