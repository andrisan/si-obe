<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Hashids\Hashids;

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
   public function index(Request $request)
    {
        if (Auth::user()->role == 'student') {
            return view('course-classes.index2', [
                'classes'=>User::find(Auth::user()->id)->students()->paginate(6),
            ]);
        }

        if (Auth::user()->role == 'admin') {

            if(!request('search')){
                $classes=CourseClass::paginate(6);
            }else{
                $cari =  $request->search;
                $classes = CourseClass::where('name','like','%'. $cari.'%')->paginate(6);
        }



            return view('course-classes.index', [
                'classes'=>$classes
            ]);
        }
        $classes= CourseClass::all();
        

        //Fitur Search
        if(!request('search')){
         $classes=CourseClass::where('creator_user_id', Auth::user()->id)->paginate(6);
        }else{
            $cari =  $request->search;
            $classes = CourseClass:: where('creator_user_id',Auth::user()->id)->where('name','like','%'. $cari.'%')->paginate(6);
        }

        //End Search

        $classesCourseId = CourseClass::where('creator_user_id', Auth::user()->id)->pluck('course_id');

        return view('course-classes.index', [
            'classes'=>$classes,
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
        $courses = Course::all();
        return view('course-classes.create',[
            'courses'=> $courses
        ]);
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
            'course_id'=> 'required|integer',
            'thumbnail_img'=> 'required|image|mimes:png,jpg,jpeg,svg',
        ]);
        
        $validateData['thumbnail_img'] = $request->file('thumbnail_img')->store('public/thumbnail');

        $classes = new CourseClass();
        $classes->name = $validateData['name'];
        $classes->course_id = $validateData['course_id'];
        $classes->creator_user_id = Auth::user()->id ;
        $classes->thumbnail_img = $validateData['thumbnail_img'];

        $classes->save();
        $classesId = $classes->id;

        $hashids = new Hashids();

        $classCode = $hashids->encode($classesId);

        CourseClass::where('id', $classesId)->update([
            'class_code' => $classCode,
        ]);

        return redirect()-> route('classes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show(Request $request)
    {

        // buat detail matkul/course
       $course = CourseClass::find($request->class);
         return view ('course-classes.show',[
        'course' => $course,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseClass $class)
    {
        $courses = Course::all();
        if (Auth::user()->role == 'teacher') {
            return view('course-classes.edit', ['class' =>$class,'courses'=> $courses]);
        } else if (Auth::user()->role == 'admin') {
            return view('course-classes.edit', ['class' =>$class,'courses'=> $courses]);
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
    public function update(Request $request, CourseClass $class)
    {
        if (Auth::user()->role == 'teacher'|| 'admin') {
             $validateData = $request->validate([
            'name'=> 'required|string',
            'course_id'=> 'required|integer',
            'thumbnail_img'=> 'required|image|mimes:png,jpg,jpeg,svg',
        ]);
             $validateData['thumbnail_img'] = $request->file('thumbnail_img')->store('public/thumbnail');
            $class->update([
                 'name' => $validateData['name'],
                 'course_id' => $validateData['course_id'],
                 'creator_user_id' => Auth::user()->id,
                 'thumbnail_img' => $validateData['thumbnail_img'],
            ]);

        }
        return redirect()-> route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseClass $class)
    {
        $class->delete();

        // if (Auth::user()->role == 'student') {
        //     return view('course-classes.index2');
        // }

        // $classesCourseId = CourseClass::where('creator_user_id', Auth::user()->id)->pluck('course_id');

        return back();
    }

    public function show_join(){
        $username = Auth::user()->name;
        return view('course-classes.show_join', [
            'username' => $username,
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

        if ($classesCourseId == null) {
            $errorMessage = 'Kelas Tidak Ditemukan';
            return view('course-classes.fail_join', [
                'errorMessage' => $errorMessage,
            ]);
        }

        $studentUserId = Auth::user()->id;

        $joinClassExist = DB::table('join_classes')->where('course_class_id', $classesCourseId)->where('student_user_id', $studentUserId)->first();

        if ($joinClassExist != null) {
            $errorMessage = 'Anda Sudah Bergabung dengan Kelas Ini';
            return view('course-classes.fail_join', [
                'errorMessage' => $errorMessage,
            ]);
        }

        DB::table('join_classes')->insert([
            'course_class_id' => $classesCourseId,
            'student_user_id' => $studentUserId
        ]);

        return redirect(route('classes.index'));
    }
}
