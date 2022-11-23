<?php

namespace App\Http\Controllers;

use App\Models\AssignmentPlan;
use Illuminate\Http\Request;

class AssignmentPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans= AssignmentPlan::get();
        return view('assignment-plans.index', [
            'plans' => $plans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assignment-plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AssignmentPlan $plan)
    {
        $validated = $request->validate([
            'id' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string|description',
            'created_at' => 'required|string',
            'updated_at' => 'required|string',
            'assignment_style' => 'required|string'
        ]);

        $plan = new AssignmentPlan();
        $plan->id = $validated['ID'];
        $plan->title = $validated['title'];
        $plan->description = $validated['description'];
        $plan->created_at = $validated['created_at'];
        $plan->updated_at = $validated['updated_at'];
        $plan->assignment_style = $validated['required|string'];

        $plan->save();

        return redirect()->route('assignment-plans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssignmentPlan  $assignmentPlan
     * @return \Illuminate\Http\Response
     */
    public function show(AssignmentPlan $plan)
    {
        $plans = AssignmentPlan::get();
        return view('assignment-plans.index', [
            'plans' => $plans
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssignmentPlan  $assignmentPlan
     * @return \Illuminate\Http\Response
     */
    public function edit( AssignmentPlan $plan)
    {
          return view('assignment-plans.edit');  
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssignmentPlan  $assignmentPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignmentPlan $plan)
    {
        $validated= $request->validate([
            'id' => 'string',
            'title' => 'string',
            'description' => 'string',
            'created_at' => 'string',
            'updated_at' => 'string',
            'assignment_style' => 'string'
        ]);
        $plan->id = $validated['ID'];
        $plan->title = $validated['title'];
        $plan->description = $validated['description'];
        $plan->created_at = $validated['created_at'];
        $plan->updated_at = $validated['updated_at'];
        $plan->assignment_style = $validated['required|string'];

        $plan->update();

        return redirect()->route('assignment-plans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignmentPlan  $assignmentPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignmentPlan $plan)
    {
        $plan->delete();
        return redirect()->route('assignment-plans.index');
    }
}
