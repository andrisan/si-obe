<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Syllabus;
use App\Models\LearningPlan;
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
        $plan = LearningPlan::with("lessonLearningOutcome")->where('syllabus_id', $syllabus)->paginate(5);
        $syllabus = Syllabus::find($syllabus);
        return view('learning-plans.index', [
            'syllabus' => $syllabus,
            'plans' => $plan
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Syllabus $syllabus)
    {
        $llos = LessonLearningOutcome::all();
        return view('learning-plans.create', [
            'syllabus' => $syllabus,
            'llos' => $llos
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
            'week_number' => 'required|integer',
            'llo_id' => 'required|numeric',
            'study_material' => 'required|string',
            'learning_method' => 'required|string',
            'estimated_time' => 'required|string',
        ]);

        $syllabus->learningPlans()->create($validated);

        return redirect()->route('syllabi.learning-plans.index', [
            'syllabus'=>$syllabus
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($syllabus, $plan)
    {
        $plan = LearningPlan::find($plan);
        $llos = LessonLearningOutcome::all();
        return  view('learning-plans.edit', [
            'syllabus' => $syllabus,
            'plan' => $plan,
            'llos' => $llos
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $syllabus, $plan)
    {
        $validated = $request->validate([
            'syllabus_id' => 'required|numeric',
            'llo_id' => 'required|numeric',
            'week_number' => 'required|integer',
            'study_material' => 'required|string',
            'learning_method' => 'required|string',
            'estimated_time' => 'required|string'
        ]);

        $plan = LearningPlan::find($plan);

        $plan->syllabus_id = $validated['syllabus_id'];
        $plan->llo_id = $validated['llo_id'];
        $plan->week_number = $validated['week_number'];
        $plan->study_material = $validated['study_material'];
        $plan->learning_method = $validated['learning_method'];
        $plan->estimated_time = $validated['estimated_time'];

        $plan->save();

        return redirect()->route('syllabi.learning-plans.index', [
            'syllabus' => $syllabus,
    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($syllabus, $plan)
    {
        $del = LearningPlan::where('id', $plan)->delete();
        
        return redirect()->route('syllabi.learning-plans.index', [
            'syllabus' => $syllabus
        ]);
    }
}