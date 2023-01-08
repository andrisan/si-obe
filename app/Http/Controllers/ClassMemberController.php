<?php

namespace App\Http\Controllers;

use App\Models\CourseClass;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassMemberController extends Controller
{
    public function create(){
        abort(404);
    }

    public function store(){
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param CourseClass $class
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function show(CourseClass $class)
    {
        $this->authorize('view', [CourseClass::class, $class]);

        $class->load('students', 'creator', 'course');

        $students = $class->students()->paginate(10)->through(fn ($user) => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'student_id_number' => $user->studentData->student_id_number,
        ]);

        return view('class-members.show', [
            'courseClass' => $class,
            'students' => $students
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return void
     */
    public function edit()
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return void
     */
    public function update()
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param CourseClass $class
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Request $request, CourseClass $class)
    {
        $this->authorize('removeStudent', [CourseClass::class, $class]);

        $student = User::findOrFail($request->student_id);

        // if student is not in the class
        if (!$class->students->contains($student)) {
            return redirect()->back()->with('error', 'Student is not in the class');
        }

        $class->students()->detach($student->id);
        return redirect()->back()->with('success', 'Student removed from class');
    }
}
