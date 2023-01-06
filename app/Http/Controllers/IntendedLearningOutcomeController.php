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
     * @param Syllabus $syllabus
     * @return Application|Factory|View
     */
    public function create(Syllabus $syllabus)
    {
        $this->authorize('create', [IntendedLearningOutcome::class, $syllabus]);

        return view('intended-learning-outcomes.create', [
            'syllabus' => $syllabus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Syllabus $syllabus
     * @return RedirectResponse
     */
    public function store(Request $request, Syllabus $syllabus)
    {
        $this->authorize('create', [IntendedLearningOutcome::class, $syllabus]);

        $validateData = $request->validate([
            'code' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);
        // get new positionn for new ilo
        $newPosition = $syllabus->intendedLearningOutcomes()->max('position') + 1;
        $validateData['position'] = $newPosition;

        $syllabus->intendedLearningOutcomes()->create($validateData);

        return redirect()->route('syllabi.show', $syllabus);
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
        $this->authorize('update', $ilo);

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
        $this->authorize('update', $ilo);

        $validateData = $request->validate([
            'position' => 'required|numeric',
            'code' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);
        $ilo->update($validateData);

        return redirect()->route('syllabi.show', $syllabus);
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
        $this->authorize('delete', $ilo);

        $ilo->delete();
        return back();
    }
}
