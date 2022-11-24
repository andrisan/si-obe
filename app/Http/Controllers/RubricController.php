<?php

namespace App\Http\Controllers;

use App\Models\AssignmentPlan;
use App\Models\Criteria;
use App\Models\Rubric;
use Illuminate\Http\Request;

class RubricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rubric = Rubric::paginate(3);

        return view('rubrics.index', [
            'rubric' => $rubric
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assignmentPlan = AssignmentPlan::all();

        return view('rubrics.create', [
            'assignmentPlan' => $assignmentPlan
        ]);
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
            'title' => 'required|string',
            'assignment_plan_title' => 'required|string',
        ]);
        $assignmentPlanId = AssignmentPlan::where('title', $validated['assignment_plan_title'])->get();

        $rubric = new Rubric();
        $rubric->title = $validated['title'];
        $rubric->assignment_plan_id = $assignmentPlanId->first()->id;
        $rubric->save();

        return redirect()->route("rubrics.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  Rubric $rubric
     * @return \Illuminate\Http\Response
     */
    public function show(Rubric $rubric)
    {
        return view('rubrics.show', [
            'rubric' => $rubric
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Rubric $rubric
     * @return \Illuminate\Http\Response
     */
    public function edit(Rubric $rubric)
    {
        return view('rubrics.edit', [
            'rubric' => $rubric
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Rubric $rubric
     * @param  Rubric $rubric
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rubric $rubric)
    {
        $validated = $request->validate([
            'title' => 'required|string',
        ]);

        $rubric->update([
            'title' => $validated['title']
        ]);

        return redirect()->route("rubrics.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Rubric $rubric
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rubric $rubric)
    {
        foreach ($rubric->criterias as $criterias) {
            foreach ($criterias->criteriaLevels as $cl) {
                foreach ($cl->studentGrades as $sg) {
                    $sg->delete();
                }
                $cl->delete();
            }foreach ($criterias->assignmentPlanTasks as $ap) {
                foreach ($ap->gradingPlans as $gp) {
                    $gp->delete();
                }
                $ap->delete();
            }
            $criterias->delete();
        }
        $rubric->delete();
        return redirect()->route("rubrics.index");
    }
}
