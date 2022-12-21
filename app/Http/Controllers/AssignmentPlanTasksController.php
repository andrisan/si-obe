<?php

namespace App\Http\Controllers;

use App\Models\AssignmentPlan;
use App\Models\AssignmentPlanTask;
use App\Models\Syllabus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AssignmentPlanTasksController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Syllabus $syllabus, AssignmentPlan $assignmentPlan)
    {
        return view('assignment-plan-tasks.create', [
            'syllabus' => $syllabus,
            'assignmentPlan' => $assignmentPlan,
            'criterias' => $assignmentPlan->rubric->criterias ?? []
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Syllabus $syllabus
     * @param AssignmentPlan $assignmentPlan
     * @return RedirectResponse
     */
    public function store(Request $request, Syllabus $syllabus, AssignmentPlan $assignmentPlan)
    {
        $validated = $request->validate([
            'code' => 'nullable|string|max:255',
            'criteria_id' => 'required|exists:criterias,id',
            'description' => 'required|string',
        ]);

        $assignmentPlan->assignmentPlanTasks()->create($validated);

        return redirect()->route('syllabi.show', $syllabus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Syllabus $syllabus
     * @param AssignmentPlan $assignmentPlan
     * @param AssignmentPlanTask $assignmentPlanTask
     * @return Application|Factory|View
     */
    public function edit(Syllabus $syllabus, AssignmentPlan $assignmentPlan, AssignmentPlanTask $assignmentPlanTask)
    {
        return view('assignment-plan-tasks.edit', [
            'syllabus' => $syllabus,
            'assignmentPlan' => $assignmentPlan,
            'assignmentPlanTask' => $assignmentPlanTask,
            'criterias' => $assignmentPlan->rubric->criterias ?? []
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Syllabus $syllabus
     * @param AssignmentPlan $assignmentPlan
     * @param AssignmentPlanTask $assignmentPlanTask
     * @return RedirectResponse
     */
    public function update(Request $request, Syllabus $syllabus, AssignmentPlan $assignmentPlan, AssignmentPlanTask $assignmentPlanTask)
    {
        $validated = $request->validate([
            'code' => 'nullable|string|max:255',
            'criteria_id' => 'required|exists:criterias,id',
            'description' => 'required|string',
        ]);

        $assignmentPlanTask->update($validated);

        return redirect()->route('syllabi.show', $syllabus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Syllabus $syllabus
     * @param AssignmentPlan $assignmentPlan
     * @param AssignmentPlanTask $assignmentPlanTask
     * @return RedirectResponse
     */
    public function destroy(Syllabus $syllabus, AssignmentPlan $assignmentPlan, AssignmentPlanTask $assignmentPlanTask)
    {
        $assignmentPlanTask->delete();
        return back();
    }
}
