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
    public function index($syllabi)
    {

        $learningPlans = LearningPlan::where('syllabus_id', $syllabi)->get();
        return view('learning-plans.index', [
            'syllabi' => $syllabi,
            // 'learningPlans' => $syllabi->learningPlans()->paginate(4)
            'learningPlans' => $learningPlans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Syllabus $syllabi)
    {
        return view('learning-plans.create', [
            'syllabi' => $syllabi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Syllabus $syllabi)
    {
        $validated = $request->validate([
            'WeekNumber' => 'required|numeric',
            'LLO_ID' => 'required|numeric',
            'studyMaterial' => 'required|string',
            'learningMethod' => 'required|string',
            'estTime' => 'required|numeric',
            'updatedAt' => 'required|numeric',
        ]);

        $syllabi->learningPlans()->create($validated);

        return redirect()->route('syllabi.learning-plans.index', [
            'syllabi' => $syllabi
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Syllabus $syllabi, LessonLearningOutcome $lessonLearningOutcome, LearningPlan $learningPlan)
    {
        ddd($syllabi, $lessonLearningOutcome, $learningPlan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Syllabus $syllabi)
    {
        return  view('learning-plans.edit', [
            'syllabi' => $syllabi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Syllabus $syllabi, LearningPlan $learningPlan)
    {
        $validated = $request->validate([
            'WeekNumber' => 'required|numeric',
            'LLO_ID' => 'required|numeric',
            'studyMaterial' => 'required|string',
            'learningMethod' => 'required|string',
            'estTime' => 'required|numeric',
            'updatedAt' => 'required|numeric',
        ]);

        $learningPlan->update($validated);

        return redirect(route('syllabi.learning-plans.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Syllabus $syllabi, LearningPlan $learningPlan)
    {
        $learningPlan->delete();
        
        return redirect()->route('syllabi.learning-plans.index', [
            'syllabi' => $syllabi
        ]);
    }
}
