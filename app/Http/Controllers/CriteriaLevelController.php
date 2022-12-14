<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\CriteriaLevel;
use App\Models\Rubric;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CriteriaLevelController extends Controller
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
     */
    public function create(Rubric $rubric, Criteria $criteria)
    {
        $this->authorize('create', [CriteriaLevel::class, $rubric]);

        return view('criteria-levels.create', [
            'rubric' => $rubric,
            'criteria' => $criteria,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request, Rubric $rubric, Criteria $criteria)
    {
        $this->authorize('create', [CriteriaLevel::class, $rubric]);

        $validated = $request->validate([
            'point' => 'required|numeric',
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $criteria->criteriaLevels()->create($validated);

        $currentMaxPoint = $criteria->criteriaLevels()->max('point');
        if ($currentMaxPoint != $criteria->max_point) {
            $criteria->update([
                'max_point' => $currentMaxPoint
            ]);
        }

        return redirect()->route('rubrics.show', $rubric);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Rubric $rubric
     * @param Criteria $criteria
     * @param CriteriaLevel $criteriaLevel
     * @return Application|Factory|View
     */
    public function edit(Rubric $rubric, Criteria $criteria, CriteriaLevel $criteriaLevel)
    {
        $this->authorize('update', $criteriaLevel);

        return view('criteria-levels.edit', [
            'rubric' => $rubric,
            'criteria' => $criteria,
            'criteriaLevel' => $criteriaLevel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Rubric $rubric
     * @param Criteria $criteria
     * @param CriteriaLevel $criteriaLevel
     * @return RedirectResponse
     */
    public function update(Request $request, Rubric $rubric, Criteria $criteria, CriteriaLevel $criteriaLevel): RedirectResponse
    {
        $this->authorize('update', $criteriaLevel);

        $validated = $request->validate([
            'point' => 'required|numeric',
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $criteriaLevel->update($validated);

        $currentMaxPoint = $criteria->criteriaLevels()->max('point');
        if ($currentMaxPoint != $criteria->max_point) {
            $criteria->update([
                'max_point' => $currentMaxPoint
            ]);
        }

        return redirect()->route('rubrics.show', $rubric);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Rubric $rubric
     * @param Criteria $criteria
     * @param CriteriaLevel $criteriaLevel
     * @return RedirectResponse
     */
    public function destroy(Rubric $rubric, Criteria $criteria, CriteriaLevel $criteriaLevel)
    {
        $this->authorize('delete', $criteriaLevel);

        $criteriaLevel->delete();
        return back();
    }
}
