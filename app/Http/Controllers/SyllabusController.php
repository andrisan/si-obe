<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseLearningOutcome;
use App\Models\IntendedLearningOutcome;
use App\Models\LessonLearningOutcome;
use App\Models\StudyProgram;
use App\Models\Syllabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
     * @return \Illuminate\Http\RedirectResponse
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
     * @param \App\Models\Syllabus $syllabus
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        // get syllabus with course, ilos, llos, and clos
        $syllabus = Syllabus::with(
            'course', 'learningPlans',
            'assignmentPlans',
            'assignmentPlans.rubric',
            'assignmentPlans.assignmentPlanTasks',
            'assignmentPlans.assignmentPlanTasks.criteria',
            'assignmentPlans.assignmentPlanTasks.criteria.lessonLearningOutcome',
            'learningPlans.lessonLearningOutcome',
            'intendedLearningOutcomes',
            'courseLearningOutcomes',
            'lessonLearningOutcomes')
            ->findOrFail($id);

        return view('syllabi.show', [
                'syllabus' => $syllabus,
                'ilos' => $syllabus->intendedLearningOutcomes()->orderBy('position')->get(),
                'clos' => $syllabus->courseLearningOutcomes()->orderBy('position')->get(),
                'llos' => $syllabus->lessonLearningOutcomes()->orderBy('position')->get(),
                'learningPlans' => $syllabus->learningPlans,
                'assignmentPlans' => $syllabus->assignmentPlans
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Syllabus $syllabus
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
     * @param \App\Models\Syllabus $syllabus
     * @return \Illuminate\Http\RedirectResponse
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
     * @param \App\Models\Syllabus $syllabus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Syllabus $syllabus)
    {
        //
        $syllabus->delete();

        return redirect()->route('syllabi.index');
    }
}
