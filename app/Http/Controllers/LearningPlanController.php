<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LearningPlan;
use App\Models\Syllabus;
use App\Models\LessonLearningOutcome;

class LearningPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($syllabus)
    {

        $learningPlans = LearningPlan::where('syllabus_id', $syllabus)->get();
        return view('learning-plans.index', [
            'learningPlans' => $learningPlans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('learning-plans.create');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Syllabus $syllabus, LessonLearningOutcome $lessonLearningOutcome, LearningPlan $learningPlan)
    {
        ddd($syllabus, $lessonLearningOutcome, $learningPlan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return  view('learning-plans.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
