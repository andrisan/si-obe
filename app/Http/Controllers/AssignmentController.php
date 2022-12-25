<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\CourseClass;
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
     * @param Assignment $assignment
     * @return Application|Factory|View|RedirectResponse
     */
    public function create(CourseClass $class, Assignment $assignment)
    {
        $availableAssignmentPlans = $this->_getAvailableAssignmentPlans($class);

        if ($availableAssignmentPlans->isEmpty()) {
            return redirect()->back()->with('error', 'You have no assignment plan available to create an assignment');
        }

        return view('assignments.create', [
            'courseClass' => $class,
            'assignment' => $assignment,
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
     * @throws ValidationException
     */
    public function store(Request $request, CourseClass $class, Assignment $assignment)
    {
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
     * @param int $assignmentID
     * @return Application|Factory|View
     */
    public function show(CourseClass $class, int $assignmentID)
    {
        $assignment = $class->assignments()
            ->with('assignmentPlan.assignmentPlanTasks.criteria.lessonLearningOutcome')
            ->findOrFail($assignmentID);

        $lessonLearningOutcomes = $assignment->assignmentPlan->assignmentPlanTasks
            ->pluck('criteria.lessonLearningOutcome')->unique();

        // if role is student, get student's grade
        if (Auth::user()->role == 'student') {
            $studentGrades = $assignment->studentGrades()
                ->where([
                    ['student_user_id', Auth::user()->id],
                    ['assignment_id', $assignment->id]
                ])
                ->with('criteriaLevel')
                ->with('assignment.assignmentPlan.rubric.criterias.criteriaLevels')
                ->get();

            if ($studentGrades->isNotEmpty()) {
                $totalCollectedPoint = $studentGrades->sum('criteriaLevel.point');
                $gradingCriterias = $studentGrades->first()->assignment->assignmentPlan->rubric->criterias;
                $totalCriteriaPoint = $gradingCriterias->sum('max_point');

                foreach($gradingCriterias as $c){
                    $c->assignmentPlanTask = $studentGrades->filter(function ($studentGrade, $key) use ($c) {
                        return $studentGrade->assignmentPlanTask->criteria_id == $c->id;
                    })->first()->assignmentPlanTask;
                    foreach ($c->criteriaLevels as $cl){
                        $selectedGrade = $studentGrades->filter(function($grade) use ($cl) {
                            return $grade->criteria_level_id == $cl->id;
                        })->first();
                        $cl->selected = !empty($selectedGrade);
                    }
                }
            }
        }

        return view('assignments.show', [
            'courseClass' => $class,
            'assignment' => $assignment,
            'lessonLearningOutcomes' => $lessonLearningOutcomes,
            // for students
            'studentGrades' => $studentGrades ?? null,
            'gradingCriterias' => $gradingCriterias ?? null,
            'totalCollectedPoint' => $totalCollectedPoint ?? 0,
            'totalCriteriaPoint' => $totalCriteriaPoint ?? 0
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CourseClass $class
     * @param Assignment $assignment
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(CourseClass $class, Assignment $assignment)
    {
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
     * @throws ValidationException
     */
    public function update(Request $request, CourseClass $class, Assignment $assignment)
    {
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
     * @param  CourseClass $class
     * @param  Assignment $assignment
     * @return RedirectResponse
     */
    public function destroy(CourseClass $class, Assignment $assignment)
    {
        $assignment->delete();
        return redirect()->route('classes.show', $class);
    }
}
