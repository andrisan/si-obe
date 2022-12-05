<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('course-classes.index');
    // }
    public function index()
    {
        if (Auth::user()->role == 'student') {
            return view('course-classes.index2', [
                'classes'=>User::find(Auth::user()->id)->students()->paginate(2),
            ]);
        }

        $classesCourseId = CourseClass::where('creator_user_id', Auth::user()->id)->pluck('course_id');

        return view('course-classes.index', [
            'classes'=>CourseClass::where('creator_user_id', Auth::user()->id)->paginate(2),
            'courses'=>Course::find($classesCourseId),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course-classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('course-classes.show_join');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseClass $courseClass)
    {
        if (Auth::user()->role == 'teacher') {
            return view('course-classes.edit', ['courseClass' =>$courseClass]);
        }
        else{
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseClass $courseClass)
    {
        if (Auth::user()->role == 'teacher') {
            $validated = $request->validate([
                'name' => 'required|string',
                'role' => 'required|in:admin,teacher,student',
                'email' => 'required|string|email',
            ]);
    
            $user->update($validated);
    
            return redirect(route('users.index'));
        }
        else{
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class->delete();

        if (Auth::user()->role == 'student') {
            return view('course-classes.index2');
        }

        $classesCourseId = CourseClass::where('creator_user_id', Auth::user()->id)->pluck('course_id');

        return view('course-classes.index', [
            'classes'=>CourseClass::where('creator_user_id', Auth::user()->id)->paginate(2),
            'courses'=>Course::find($classesCourseId),
        ]);
    }
}
