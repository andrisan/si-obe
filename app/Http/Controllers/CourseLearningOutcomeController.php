<?php

namespace App\Http\Controllers;

use App\Models\Syllabus;
use App\Models\IntendedLearningOutcome;
use App\Models\CourseLearningOutcome;
use App\Models\LessonLearningOutcome;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseLearningOutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Syllabus $syllabus, IntendedLearningOutcome $ilo)
    {
        return view('course-learning-outcomes.index', [
            'syllabus' => $syllabus,
            'ilo' => $ilo,
            'clos' => $ilo->courseLearningOutcomes()->orderBy('position')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $ilo
     * @return Application|Factory|View
     */
    public function create(Syllabus $syllabus, IntendedLearningOutcome $ilo)
    {
        return view('course-learning-outcomes.create', [
            'syllabus' => $syllabus,
            'ilo' => $ilo,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request, $syllabus, IntendedLearningOutcome $ilo)
    {
        $validated = $request->validate([
            'description' => 'required|string',
        ]);
        $newPosition = $ilo->courseLearningOutcomes()->max('position') + 1;
        $validated['position'] = $newPosition;

        $ilo->courseLearningOutcomes()->create($validated);

        return redirect()->route('syllabi.ilos.clos.index', [
            'syllabus' => $syllabus,
            'ilo' => $ilo,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($syllabus, $ilo, CourseLearningOutcome $clo)
    {
        $llos = LessonLearningOutcome::where('clo_id', $clo['id'])->orderBy('position')->get();

        return view('course-learning-outcomes.show', [
            'syllabus' => $syllabus,
            'ilo' => $ilo,
            'clo' => $clo,
            'llos' => $llos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $intendedLearningOutcome
     * @param CourseLearningOutcome $courseLearningOutcome
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($syllabus, $ilo, CourseLearningOutcome $clo)
    {
        return view('course-learning-outcomes.edit', [
            'syllabus' => $syllabus,
            'ilo' => $ilo,
            'clo' => $clo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $intendedLearningOutcome
     * @param CourseLearningOutcome $courseLearningOutcome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $syllabus, $ilo, CourseLearningOutcome $clo): RedirectResponse
    {
        $validated = $request->validate([
            'position' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $clo->update($validated);

        return redirect()->route('syllabi.ilos.clos.index', [
            'syllabus' => $syllabus,
            'ilo' => $ilo,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($syllabus, $ilo, CourseLearningOutcome $clo)
    {

        //
        $clo->delete();

        return redirect()->route('syllabi.ilos.clos.index', [
            'syllabus' => $syllabus,
            'ilo' => $ilo,
        ]);
    }
    // button delete

}
