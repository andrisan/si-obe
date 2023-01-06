<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\Rubric;

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

    public function show()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create(Rubric $rubric)
    {
        $this->authorize('create', [Criteria::class, $rubric]);

        $rubric->load('assignmentPlan.syllabus.lessonLearningOutcomes');

        if (empty($rubric->assignmentPlan)) {
            abort(404);
        }

        return view('criteria.create', [
            'rubric' => $rubric,
            'llos' => $rubric->assignmentPlan->syllabus->lessonLearningOutcomes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Rubric $rubric
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Request $request, Rubric $rubric)
    {
        $this->authorize('create', [Criteria::class, $rubric]);

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
     * Show the form for editing the specified resource.
     *
     * @param Rubric $rubric
     * @param Criteria $criteria
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(Rubric $rubric, Criteria $criteria)
    {
        $this->authorize('update', $criteria);

        $rubric->load('assignmentPlan.syllabus.lessonLearningOutcomes');

        return view('criteria.edit', [
            'rubric' => $rubric,
            'criteria' => $criteria,
            'llos' => $rubric->assignmentPlan->syllabus->lessonLearningOutcomes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Rubric $rubric
     * @param Criteria $criteria
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, Rubric $rubric, Criteria $criteria)
    {
        $this->authorize('update', $criteria);

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
     * @throws AuthorizationException
     */
    public function destroy(Rubric $rubric, Criteria $criteria)
    {
        $this->authorize('delete', $criteria);

        $criteria->delete();
        return back();
    }
}
