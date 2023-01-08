<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\CourseClass;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AssignmentController extends Controller
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

    private function _getAvailableAssignmentPlans(CourseClass $class){
        $syllabus = $class->syllabus()->with('assignmentPlans')->first();

        if (empty($syllabus)){ abort(404); }

        // get AssignmentPlan that is not used by this class
        return $syllabus->assignmentPlans()
            ->whereNotIn('id', $class->assignments()->pluck('assignment_plan_id'))->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CourseClass $class
     * @return Application|Factory|View|RedirectResponse
     * @throws AuthorizationException
     */
    public function create(CourseClass $class)
    {
        $this->authorize('create', [Assignment::class, $class]);

        $availableAssignmentPlans = $this->_getAvailableAssignmentPlans($class);

        if ($availableAssignmentPlans->isEmpty()) {
            return redirect()->back()->with('error', 'You have no assignment plan available to create an assignment');
        }

        return view('assignments.create', [
            'courseClass' => $class,
            'availableAssignmentPlans' => $availableAssignmentPlans,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param CourseClass $class
     * @param Assignment $assignment
     * @return RedirectResponse
     * @throws ValidationException|AuthorizationException
     */
    public function store(Request $request, CourseClass $class, Assignment $assignment)
    {
        $this->authorize('create', [Assignment::class, $class]);

        $validator = Validator::make($request->all(), [
            'assignment_plan_id' => 'required|numeric',
            'course_class_id' => 'required|numeric',
            'due_date' => 'nullable|date',
            'note' => 'nullable|string',
        ]);

        $validator->after(function ($validator) use ($request, $class) {
            $availableAssignmentPlans = $this->_getAvailableAssignmentPlans($class);

            if ($availableAssignmentPlans->isEmpty()) {
                $validator->errors()->add('assignment_plan_id', 'You have no assignment plan available to create an assignment');
            }

            if (!$availableAssignmentPlans->contains('id', $request->assignment_plan_id)) {
                $validator->errors()->add('assignment_plan_id', 'The selected assignment plan is invalid.');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $assignment->assignment_plan_id = $validated['assignment_plan_id'];
        $assignment->course_class_id = $validated['course_class_id'];
        $assignment->assigned_date = Carbon::now('Asia/Jakarta');
        $assignment->due_date = $validated['due_date'];
        $assignment->note = $validated['note'];

        $assignment->save();

        return redirect()->route('classes.show',  $class);
    }

    /**
     * Display the specified resource.
     *
     * @param CourseClass $class
     * @param Assignment $assignment
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function show(CourseClass $class, Assignment $assignment)
    {
        $this->authorize('view', $assignment);

        $assignment->load('assignmentPlan.assignmentPlanTasks.criteria.lessonLearningOutcome',
            'assignmentPlan.assignmentPlanTasks.criteria.criteriaLevels'
        );

        $lessonLearningOutcomes = $assignment->assignmentPlan->assignmentPlanTasks
            ->pluck('criteria.lessonLearningOutcome')->unique();

        // if role is student, get student's grade
        if (Auth::user()->role == 'student') {
            if (empty($assignment->assignmentPlan->assignmentPlanTasks)) {
                abort(500);
            }

            $studentGrades = $assignment->studentGrades()
                ->where([
                    ['student_user_id', Auth::user()->id],
                    ['assignment_id', $assignment->id]
                ])
                ->with('criteriaLevel')
                ->with('assignment.assignmentPlan.rubric.criterias.criteriaLevels')
                ->get();

            if ($studentGrades->isNotEmpty()) {
                $assignment->assignmentHasBeenGraded = true;
                $assignment->totalCollectedPoint = $studentGrades->sum('criteriaLevel.point');
                $assignmentCriterias = $studentGrades->first()->assignment->assignmentPlan->rubric->criterias;
                $assignment->totalCriteriaPoint = $assignmentCriterias->sum('max_point');

                foreach ($assignment->assignmentPlan->assignmentPlanTasks as $assignmentPlanTask) {
                    $assignmentPlanTask->criteria->criteriaLevels->each(function ($criteriaLevel) use ($studentGrades) {
                        $criteriaLevel->isAchieved = $studentGrades->contains('criteria_level_id', $criteriaLevel->id);
                    });
                }
            }
        }

        return view('assignments.show', [
            'courseClass' => $class,
            'assignment' => $assignment,
            'lessonLearningOutcomes' => $lessonLearningOutcomes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CourseClass $class
     * @param Assignment $assignment
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(CourseClass $class, Assignment $assignment)
    {
        $this->authorize('update', $assignment);

        $availableAssignmentPlans = $this->_getAvailableAssignmentPlans($class);
        $availableAssignmentPlans->push($assignment->assignmentPlan);

        return view('assignments.edit', [
            'courseClass' => $class,
            'assignment' => $assignment,
            'availableAssignmentPlans' => $availableAssignmentPlans
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CourseClass $class
     * @param Assignment $assignment
     * @return RedirectResponse
     * @throws ValidationException|AuthorizationException
     */
    public function update(Request $request, CourseClass $class, Assignment $assignment)
    {
        $this->authorize('update', $assignment);

        $validator = Validator::make($request->all(), [
            'assignment_plan_id' => 'required|numeric',
            'due_date' => 'nullable|date',
            'note' => 'nullable|string',
        ]);

        $validator->after(function ($validator) use ($request, $class, $assignment) {
            $availableAssignmentPlans = $this->_getAvailableAssignmentPlans($class);
            $availableAssignmentPlans->push($assignment->assignmentPlan);

            if ($availableAssignmentPlans->isEmpty() && $assignment->assignment_plan_id != (int) $request->assignment_plan_id) {
                $validator->errors()->add('assignment_plan_id', 'An assignment plan can only be used once per class');
            }

            if (!$availableAssignmentPlans->contains('id', $request->assignment_plan_id)) {
                $validator->errors()->add('assignment_plan_id', 'The selected assignment plan is invalid.');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $assignment->update($validated);

        return redirect()->route('classes.assignments.show', [$class, $assignment]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CourseClass $class
     * @param Assignment $assignment
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(CourseClass $class, Assignment $assignment)
    {
        $this->authorize('delete', $assignment);

        $assignment->delete();
        return redirect()->route('classes.show', $class);
    }
}
