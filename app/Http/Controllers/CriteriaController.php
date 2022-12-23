<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\Rubric;
use App\Models\LessonLearningOutcome;
use Illuminate\Http\Response;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create($rubric_id)
    {
        $rubric = Rubric::with('assignmentPlan.syllabus.lessonLearningOutcomes')->findOrFail($rubric_id);

        $assignmentPlan = $rubric->assignmentPlan;
        if (empty($assignmentPlan)) {
            abort(404);
        }
        $llos = $assignmentPlan->syllabus->lessonLearningOutcomes;

        return view('criteria.create', [
            'rubric' => $rubric,
            'llos' => $llos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Rubric $rubric
     * @return RedirectResponse
     */
    public function store(Request $request, Rubric $rubric)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'llo' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $criteria = new Criteria();
        $criteria->rubric_id = $rubric->id;
        $criteria->llo_id = $validated['llo'];
        $criteria->title = $validated['title'];
        $criteria->description = $validated['description'];
        $criteria->save();

        return redirect()->route('rubrics.show', $rubric);
    }


    /**
     * Display the specified resource.
     *
     * @param Rubric $rubric
     * @return RedirectResponse
     */
    public function show(Rubric $rubric)
    {
        return redirect()->route('rubrics.show', $rubric);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $rubric_id
     * @param Criteria $criteria
     * @return Application|Factory|View
     */
    public function edit(int $rubric_id, Criteria $criteria)
    {
        $rubric = Rubric::with('assignmentPlan.syllabus.lessonLearningOutcomes')->findOrFail($rubric_id);

        $llos = $rubric->assignmentPlan->syllabus->lessonLearningOutcomes;

        return view('criteria.edit', [
            'rubric' => $rubric,
            'criteria' => $criteria,
            'llos' => $llos
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Rubric $rubric
     * @param Criteria $criteria
     * @return RedirectResponse
     */
    public function update(Request $request, Rubric $rubric, Criteria $criteria)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'llo' => 'required|numeric',
        ]);

        $criteria->update([
            'title' => $validated['title'],
            'llo_id' => $validated['llo'],
            'description' => $validated['description']
        ]);

        return redirect()->route('rubrics.show', $rubric);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Rubric $rubric
     * @param Criteria $criteria
     * @return RedirectResponse
     */
    public function destroy(Rubric $rubric, Criteria $criteria)
    {
        $criteria->delete();
        return back();
    }
}
