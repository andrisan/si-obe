<?php

namespace App\Http\Controllers;

use App\Models\CourseClass;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $courseClass = CourseClass::with('students','creator', 'course')
            ->findOrFail($id);

        $students = $courseClass->students()->paginate(10)->through(fn ($user) => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'student_id_number' => $user->studentData->student_id_number,
        ]);

        return view('class-members.show', [
            'courseClass' => $courseClass,
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
     * @param  int  $courseClassId
     * @return RedirectResponse
     */
    public function destroy(Request $request, $courseClassId)
    {
        $student = User::findOrFail($request->student_id);
        $courseClass = CourseClass::findOrFail($courseClassId);

        // if student is not in the class
        if (!$courseClass->students->contains($student)) {
            return redirect()->back()->with('error', 'Student is not in the class');
        }

        $courseClass->students()->detach($student->id);
        return redirect()->back()->with('success', 'Student removed from class');
    }
}
