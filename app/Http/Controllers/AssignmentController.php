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
use Illuminate\Http\Response;

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

    /**
     * Show the form for creating a new resource.
     *
     * @param CourseClass $class
     * @param Assignment $assignment
     * @return Application|Factory|View
     */
    public function create(CourseClass $class, Assignment $assignment)
    {
        return view('assignments.create', [
            'courseClass' => $class,
            'assignment' => $assignment
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param CourseClass $class
     * @param Assignment $assignment
     * @return RedirectResponse
     */
    public function store(Request $request, CourseClass $class, Assignment $assignment)
    {
        $validated = $request->validate([
            'assignment_plan_id' => 'required|numeric',
            'course_class_id' => 'required|numeric',
            'due_date' => 'required|date',
            'note' => 'nullable|string',
        ]);

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
     */
    public function show(CourseClass $class, Assignment $assignment)
    {
        return view('assignments.show', [
            'courseClass' => $class,
            'assignment' => $assignment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CourseClass $class
     * @param Assignment $assignment
     * @return Application|Factory|View
     */
    public function edit(CourseClass $class, Assignment $assignment)
    {
        return view('assignments.edit', [
            'courseClass' => $class,
            'assignment' => $assignment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CourseClass $class
     * @param Assignment $assignment
     * @return RedirectResponse
     */
    public function update(Request $request, CourseClass $class, Assignment $assignment)
    {
        $validated = $request->validate([
            'assignment_plan_id' => 'required|numeric',
            'due_date' => 'required|date',
            'note' => 'nullable|string',
        ]);

        $assignment->update($validated);

        return redirect()->route('course-classes.assignments.show', [$class, $assignment]);
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
        return redirect()->route('course-classes.show', $class);
    }
}
