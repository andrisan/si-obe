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
        $plans = AssignmentPlan::query()
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($plans) => [
                'id' => $plans->id,
                'title' => $plans->title,
                'description' => $plans->description,
                'created_at' => $plans->created_at->toFormattedDateString(),
                'updated_at' => $plans->updated_at->toFormattedDateString(),
                'assignment_style' => $plans->assignment_style,
            ]);

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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string|description',
           // '' => 'required|string|confirmed',
            //'password_confirmation' => 'required|string',
        ]);

       // $user = new User();
       // $user->name = $validated['name'];
       // $user->email = $validated['email'];
       // $user->password = bcrypt($validated['password']);
       // $user->save();

       // return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssignmentPlan  $assignmentPlan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('assignment-plans.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssignmentPlan  $assignmentPlan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
