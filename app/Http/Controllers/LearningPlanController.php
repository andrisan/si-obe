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
            'syllabi' => $syllabus,
            // 'learningPlans' => $syllabi->learningPlans()->paginate(4)
            'learningPlans' => $learningPlans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Syllabus $syllabus)
    {
        return view('learning-plans.create', [
            'syllabi' => $syllabus
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
            'id' => 'required|numeric',
            'syllabus_id' => 'required|numeric',
            'week_number' => 'required|integer',
            'llo_id' => 'required|numeric',
            'study_material' => 'required|string',
            'learning_method' => 'required|string',
            'estimated_time' => 'required|string',
            'created_at' => 'date',
            'updated_at' => 'date',
        ]);

        $syllabus->learningPlan()->create($validated);

        return redirect()->route('syllabi.learning-plans.index', [
            'syllabi'=>$syllabus
        ]);
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
    public function edit(Syllabus $syllabus, LearningPlan $learningPlan)
    {
        return  view('learning-plans.edit', [
            'syllabi' => $syllabus,
            'learningPlan' => $learningPlan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Syllabus $syllabus, LearningPlan $learningPlan)
    {
        $validated = $request->validate([
            'id' => 'required|numeric',
            'week_number' => 'required|integer',
            'study_material' => 'required|string',
            'learning_method' => 'required|string',
            'estimated_time' => 'required|string',
            'updated_at' => 'date',
        ]);

        $learningPlan->update($validated);

        return redirect()->route('syllabi.learning-plans.index', [
            'syllabi' => $syllabus,
            'learningPlan' => $learningPlan
    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Syllabus $syllabus, LearningPlan $learningPlan)
    {
        $learningPlan->delete();
        
        return redirect()->route('syllabi.learning-plans.index', [
            'syllabi' => $syllabus
        ]);
    }
}
