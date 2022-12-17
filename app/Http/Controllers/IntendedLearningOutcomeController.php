<?php

namespace App\Http\Controllers;

use App\Models\IntendedLearningOutcome;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Models\Syllabus;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class IntendedLearningOutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Syllabus $syllabus)
    {
        return view('intended-learning-outcomes.index', [
            'syllabus' => $syllabus,
            'ilos' => $syllabus->intendedLearningOutcomes()->orderBy('position')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Syllabus $syllabus)
    {
        return view('intended-learning-outcomes.create', [
            'syllabus' => $syllabus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function store(Request $request, Syllabus $syllabus)
    {
        $validateData = $request->validate([
            'description' => 'required|string',
        ]);
        // get new positionn for new ilo
        $newPosition = $syllabus->intendedLearningOutcomes()->max('position') + 1;
        $validateData['position'] = $newPosition;

        $syllabus->intendedLearningOutcomes()->create($validateData);

        return redirect()->route('syllabi.ilos.index', [
            'syllabus' => $syllabus,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Syllabus $syllabus
     * @param Request $request
     * @return Response
     */
    public function show(Syllabus $syllabus, Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $ilo
     * @return Application|Factory|View
     */
    public function edit(Syllabus $syllabus, IntendedLearningOutcome $ilo)
    {
        // return view('intended-learning-outcomes.edit');
        return view('intended-learning-outcomes.edit', [
            'syllabus' => $syllabus,
            'ilo' => $ilo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $ilo
     * @return RedirectResponse
     */
    public function update(Request $request, Syllabus $syllabus, IntendedLearningOutcome $ilo)
    {
        $validateData = $request->validate([
            'position' => 'required|numeric',
            'description' => 'required|string',
        ]);
        $ilo->update($validateData);

        return redirect()->route('syllabi.ilos.index', [
            'syllabus' => $syllabus,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $ilo
     * @return RedirectResponse
     */
    public function destroy(Syllabus $syllabus, IntendedLearningOutcome $ilo)
    {
        $ilo->delete();
        return back();
    }
}
