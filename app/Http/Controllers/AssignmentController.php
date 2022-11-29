<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\CourseClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CourseClass $courseClass)
    {
        return view('assignments.index', [
            'courseClass' => $courseClass,
            'assignments' => $courseClass
                                ->assignments()
                                ->orderBy('id', 'desc')
                                ->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CourseClass $courseClass, Assignment $assignment)
    {
        return view('assignments.create', [
            'courseClass' => $courseClass,
            'assignment' => $assignment
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CourseClass $courseClass, Assignment $assignment)
    {
        $validated = $request->validate([
            'assignment_plan_id' => 'required|numeric',
            'course_class_id' => 'required|numeric',
            'assigned_date' => 'required|date',
            'due_date' => 'required|date',
            'note' => 'nullable|string',
        ]);

        $assignment->create($validated);

        return redirect()->route('course-classes.assignments.index', [
            $courseClass
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CourseClass $courseClass, Assignment $assignment)
    {
        return view('assignments.show', [
            'courseClass' => $courseClass,
            'assignment' => $assignment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseClass $courseClass, Assignment $assignment)
    {
        return view('assignments.edit', [
            'courseClass' => $courseClass,
            'assignment' => $assignment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  CourseClass $courseClass
     * @param  Assignment $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseClass $courseClass, Assignment $assignment)
    {
        $validated = $request->validate([
            'assignment_plan_id' => 'required|numeric',
            'assigned_date' => 'required|date',
            'due_date' => 'required|date',
            'note' => 'nullable|string',
        ]);

        $assignment->update($validated);

        return redirect()->route('course-classes.assignments.show', [$courseClass, $assignment]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CourseClass $courseClass
     * @param  Assignment $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseClass $courseClass, Assignment $assignment)
    {
        $assignment->delete();

        return redirect()->route('course-classes.assignments.index', [$courseClass, $assignment]);
    }
}
