<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Syllabus;
use App\Models\AssignmentPlan;




class AssignmentPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($syllabus)
    {
        $plans= AssignmentPlan::where('syllabus_id', $syllabus)->get();

        return view('assignment-plans.index', [
            'syllabus' => $syllabus,
            'plans' => $plans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Syllabus $syllabus)
    {
        return view('assignment-plans.create',[
            'syllabus' => $syllabus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Syllabus $syllabus)
    {
        $validated = $request->validate([
          //  'id' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
           // 'created_at' => 'required|string',
           // 'updated_at' => 'required|string',
        //    'is_group_assignment' => 'required|numeric',
            'assignment_style' => 'required|string'
        //    'output_instruction' => 'required|string',
        //    'submission_instruction' => 'required|string',
        //    'deadline_instruction' => 'required|string',
        ]);

        $syllabus->assignmentPlans()->create($validated);

        return redirect()->route('syllabi.assignment-plans.index',[
            'syllabus'=> $syllabus
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssignmentPlan  $assignmentPlan
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssignmentPlan  $assignmentPlan
     * @return \Illuminate\Http\Response
     */
    public function edit( $syllabus, $plan)
    {
          return view('assignment-plans.edit',[
            'syllabus' => $syllabus,
            'plan'=> $plan
          ]);  
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssignmentPlan  $assignmentPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $syllabus, $plan)
    {
        $validated = $request->validate([
            //'id' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
           // 'created_at' => 'required|string',
           // 'updated_at' => 'required|string',
        //    'is_group_assignment' => 'required|numeric',
            'assignment_style' => 'required|string'
        //    'output_instruction' => 'required|string',
        //    'submission_instruction' => 'required|string',
        //    'deadline_instruction' => 'required|string',
        ]);

        $plan = AssignmentPlan::find($plan);

        $plan->syllabus_id = $syllabus;
        $plan->id = $validated['id'];
        $plan->title = $validated['title'];
        $plan->description = $validated['description'];
        $plan->created_at = $validated['created_at'];
        $plan->updated_at = $validated['updated_at'];
        $plan->assignment_style = $validated['assignment_style'];
       // $plan->output_instruction = $validated['output_instruction'];
       // $plan->submission_instruction = $validated['submission_instruction'];
       // $plan->deadline_instruction = $validated['deadline_instruction'];

        $plan->save();

        return redirect()->route('syllabi.assignment-plans.index',[
            'syllabus' => $syllabus
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignmentPlan  $assignmentPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy($syllabus, $plan)
    {
        $del = AssignmentPlan::where('id', $plan)->delete();

        return redirect()->route('syllabi.assignment-plans.index',[
            'syllabus' => $syllabus
        ]);
    }
}