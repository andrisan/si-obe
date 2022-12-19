<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\CriteriaLevel;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Rubric $rubric)
    {
        $llos = LessonLearningOutcome::all();
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
     * @param int $id
     * @return Response
     */
    public function show($rubric, $criterias)
    {
        $criterias = Criteria::with("LessonLearningOutcome")->where('rubric_id', $rubric)->find($criterias);
        return view('criteria.show', [
            'rubric' => $rubric,
            'criterias' => $criterias
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(Rubric $rubric, $criterias)
    {
        //
        $llos = LessonLearningOutcome::all();
        $criterias = Criteria::where('id', $criterias)->first();

        return view('criteria.edit', [
            'rubric' => $rubric,
            'criterias' => $criterias,
            'llos' => $llos
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Rubric $rubric, Criteria $criteria)
    {
        //
        $validated = $request->validate([
            //
            'title' => 'required|string',
            'description' => 'required|string',
            'llo' => 'required|string'
        ]);

        $criteria->update([
            'title' => $validated['title'],
            'llo_id' => $validated['llo'],
            'description' => $validated['description']
        ]);

        return redirect()->route('rubrics.criterias.show', [$rubric, $criteria]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($rubric, $criterias)
    {
        $del = Criteria::where('id', $criterias)->delete();

        return redirect()->route('rubrics.criterias.index', [
            'rubric' => $rubric
        ]);
    }

}
