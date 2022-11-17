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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assignmen-plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssignmentPlan  $assignmentPlan
     * @return \Illuminate\Http\Response
     */
    public function show(AssignmentPlan $assignmentPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssignmentPlan  $assignmentPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignmentPlan $assignmentPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssignmentPlan  $assignmentPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignmentPlan $assignmentPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignmentPlan  $assignmentPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignmentPlan $assignmentPlan)
    {
        //
    }
}
