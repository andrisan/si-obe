<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseLearningOutcome;
use App\Models\IntendedLearningOutcome;
use App\Models\LessonLearningOutcome;
use App\Models\StudyProgram;
use App\Models\Syllabus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SyllabusController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Syllabus::class, 'syllabus');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $syllabi = Syllabus::with('course')->where('creator_user_id', Auth::id())->paginate(10);
        return view('syllabi.index', [
            'syllabi' => $syllabi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('syllabi.create', [
                'courses' => Course::all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'head_of_study_program' => 'required|string',
            'author' => 'required|string',
            'course_id' => 'required'
        ]);

        $syllabus = new Syllabus();
        $syllabus->title = $validated['title'];
        $syllabus->head_of_study_program = $validated['head_of_study_program'];
        $syllabus->author = $validated['author'];
        $syllabus->course_id = $validated['course_id'];
        $syllabus->creator_user_id = Auth::id();
        $syllabus->save();

        return redirect()->route('syllabi.show', $syllabus);
    }

    /**
     * Display the specified resource.
     *
     * @param Syllabus $syllabus
     * @return Application|Factory|View
     */
    public function show(Syllabus $syllabus)
    {
        // get syllabus with course, ilos, llos, and clos
        $syllabus->load(
            'course', 'learningPlans',
            'assignmentPlans',
            'assignmentPlans.rubric',
            'assignmentPlans.assignmentPlanTasks',
            'assignmentPlans.assignmentPlanTasks.criteria',
            'assignmentPlans.assignmentPlanTasks.criteria.lessonLearningOutcome',
            'learningPlans.lessonLearningOutcome',
            'intendedLearningOutcomes',
            'courseLearningOutcomes',
            'lessonLearningOutcomes');

        return view('syllabi.show', compact('syllabus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Syllabus $syllabus
     * @return Application|Factory|View
     */
    public function edit(Syllabus $syllabus)
    {
        return view('syllabi.edit', [
                'syllabus' => $syllabus,
                'courses' => Course::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Syllabus $syllabus
     * @return RedirectResponse
     */
    public function update(Request $request, Syllabus $syllabus)
    {
        $validated = $request->validate([
            'author' => 'required|string',
            'title' => 'required|string',
            'head_of_study_program' => 'required|string',
            'course_id' => 'required'
        ]);
        $syllabus->update($validated);

        return redirect()->route('syllabi.show', $syllabus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Syllabus $syllabus
     * @return Response
     */
    public function destroy(Syllabus $syllabus)
    {
        //
        $syllabus->delete();

        return redirect()->route('syllabi.index');
    }
}
