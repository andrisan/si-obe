<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Syllabus;
use App\Models\LearningPlan;
use App\Models\LessonLearningOutcome;

class LearningPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Syllabus $syllabus)
    {
        $this->authorize('viewAny', [LearningPlan::class, $syllabus]);

        return view('learning-plans.index', [
            'syllabus' => $syllabus,
            'learningPlans' => $syllabus->learningPlans()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Syllabus $syllabus)
    {
        $this->authorize('create', [LearningPlan::class, $syllabus]);

        return view('learning-plans.create', [
            'syllabus' => $syllabus,
            'llos' => $syllabus->lessonLearningOutcomes()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Syllabus $syllabus)
    {
        $validated = $request->validate([
            'week_number' => 'required|integer',
            'llo_id' => 'required|numeric',
            'study_material' => 'required|string',
            'learning_method' => 'required|string',
            'estimated_time' => 'required|string',
        ]);

        $syllabus->learningPlans()->create($validated);

        return redirect()->route('syllabi.learning-plans.index', [
            'syllabus' => $syllabus
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Syllabus $syllabus
     * @param LearningPlan $learningPlan
     * @return Application|Factory|View
     */
    public function edit(Syllabus $syllabus, LearningPlan $learningPlan)
    {
        $this->authorize('update', $learningPlan);

        return view('learning-plans.edit', [
            'syllabus' => $syllabus,
            'learningPlan' => $learningPlan,
            'llos' => $syllabus->lessonLearningOutcomes()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Syllabus $syllabus
     * @param LearningPlan $learningPlan
     * @return RedirectResponse
     */
    public function update(Request $request, Syllabus $syllabus, LearningPlan $learningPlan)
    {
        $this->authorize('update', $learningPlan);

        $validated = $request->validate([
            'llo_id' => 'required|numeric',
            'week_number' => 'required|integer',
            'study_material' => 'required|string',
            'learning_method' => 'required|string',
            'estimated_time' => 'required|string'
        ]);

        $learningPlan->update($validated);

        return redirect()->route('syllabi.learning-plans.index', [
            'syllabus' => $syllabus,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Syllabus $syllabus
     * @param LearningPlan $learningPlan
     * @return RedirectResponse
     */
    public function destroy(Syllabus $syllabus, LearningPlan $learningPlan)
    {
        $this->authorize('delete', $learningPlan);

        $learningPlan->delete();
        return back();
    }
}
