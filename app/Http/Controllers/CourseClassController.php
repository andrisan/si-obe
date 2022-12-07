<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        //Fitur Search
        if(request('search')){
            $classesCourseid->where('name','like','%'. request('search'.'%'));
        }

        //End Search

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
        $validateData = $request->validate([
            'name'=> 'required|string',
            'thumbnail_img'=> 'required|image|mimes:png,jpg,jpeg,svg',
            'class_code'=> 'required|string',
        ]);

        $validateData['thumbnail_img'] = $request->file('thumbnail_img')->store('thumbnail');
        CourseClass::create($validateData);
        
        return redirect()-> route('classes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show(Request $request)
    {
        $class = CourseClass::find($request->class);

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
        if (Auth::user()->role == 'teacher' || 'admin') {
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
        if (Auth::user()->role == 'teacher'|| 'admin') {
            $validated = $request->validate([
                'name' => 'required|string',
                'thumbnail_img' => 'required|string',
                'class_code' => 'required|string',
            ]);

            $courseClass ->CourseClass()->update($validated);    
            $courseClass->update($validated);

            return redirect(route('course-classes.index'));
 
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

    public function join(Request $request){
        if (Auth::user()->role != 'student') {
            abort(403);
        }
         
        $validated = $request->validate([
            'class_code' => 'required|string'
        ]);

        $classesCourseId = CourseClass::where('class_code', $validated['class_code'])->value('id');

        $studentUserId = Auth::user()->id;

        DB::table('join_classes')->insert([
            'course_class_id' => $classesCourseId,
            'student_user_id' => $studentUserId
        ]);

        return redirect(route('classes.index'));
    }
}
