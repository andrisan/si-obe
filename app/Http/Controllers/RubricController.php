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
use Illuminate\Support\Facades\Auth;

class RubricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
     * @param  \Illuminate\Http\Request  $request
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
     * @return \Illuminate\Http\Response
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
     * @param  \Illuminate\Http\Rubric $rubric
     * @param  Rubric $rubric
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rubric $rubric)
    {
        foreach ($rubric->criterias as $criterias) {
            foreach ($criterias->criteriaLevels as $cl) {
                foreach ($cl->studentGrades as $sg) {
                    $sg->delete();
                }
                $cl->delete();
            }foreach ($criterias->assignmentPlanTasks as $ap) {
                foreach ($ap->gradingPlans as $gp) {
                    $gp->delete();
                }
                $ap->delete();
            }
            $criterias->delete();
        }
        $rubric->delete();
        return redirect()->route("rubrics.index");
    }
}
