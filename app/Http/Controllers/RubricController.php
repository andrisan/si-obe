<?php

namespace App\Http\Controllers;

use App\Models\AssignmentPlan;
use App\Models\Criteria;
use App\Models\Rubric;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RubricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $rubrics = Rubric::with(['assignmentPlan' => function($query) {
                $query->with(['syllabus' => function($query) {
                    $query->where('creator_user_id', Auth::id());
                }]);
            }
        ])->paginate(10);

        return view('rubrics.index', [
            'rubrics' => $rubrics
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function create(Request $request)
    {
        $assignmentPlanId = $request->query('assignment_plan');
        if (empty($assignmentPlanId)) { return back(); }

        // is rubric already created?
        $rubric = Rubric::where('assignment_plan_id', $assignmentPlanId)->first();
        if (!empty($rubric)) {
            return redirect()->route('rubrics.edit', $rubric);
        }

        $assignmentPlan = AssignmentPlan::with('syllabus')->findOrFail($assignmentPlanId);

        return view('rubrics.create', [
            'assignmentPlan' => $assignmentPlan,
            'syllabus' => $assignmentPlan->syllabus,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'assignment_plan_id' => 'required|integer',
        ]);

        $rubric = new Rubric();
        $rubric->title = $validated['title'];
        $rubric->assignment_plan_id = $validated['assignment_plan_id'];
        $rubric->save();

        return redirect()->route("rubrics.show", $rubric);
    }

    /**
     * Display the specified resource.
     *
     * @param  Rubric $rubric
     * @return Application|Factory|View
     */
    public function show(Rubric $rubric)
    {
        return view('rubrics.show', [
            'rubric' => $rubric,
            'assignmentPlan' => $rubric->assignmentPlan,
            'syllabus' => $rubric->assignmentPlan->syllabus,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Rubric $rubric
     * @return Application|Factory|View
     */
    public function edit(Rubric $rubric)
    {
        return view('rubrics.edit', [
            'rubric' => $rubric
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Rubric $rubric
     * @return RedirectResponse
     */
    public function update(Request $request, Rubric $rubric)
    {
        $validated = $request->validate([
            'title' => 'required|string',
        ]);

        $rubric->update([
            'title' => $validated['title']
        ]);

        return redirect()->route("rubrics.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Rubric $rubric
     * @return RedirectResponse
     */
    public function destroy(Rubric $rubric)
    {
        $criterias = $rubric->criterias;
        foreach ($criterias as $criteria) {

            $criteriaLevels = $criteria->criteriaLevels ?? [];
            foreach ($criteriaLevels as $cl) {
                $studentGrades = $cl->studentGrades ?? [];
                foreach ($studentGrades as $sg) {
                    $sg->delete();
                }
                $cl->delete();
            }

            $assignmentPlanTasks = $criteria->assignmentPlanTasks ?? [];
            foreach ($assignmentPlanTasks as $ap) {
                $gradingPlans = $ap->gradingPlan ?? [];
                foreach ($gradingPlans as $gp) {
                    $gp->delete();
                }
                $ap->delete();
            }
            $criteria->delete();
        }
        $rubric->delete();
        return back();
    }
}
