<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseClass;
use App\Models\Syllabus;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Hashids\Hashids;
use Illuminate\Support\Facades\Gate;

class CourseClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|RedirectResponse
     */
    // public function index()
    // {
    //     return view('course-classes.index');
    // }
    public function index(Request $request)
    {
        if (Gate::allows('is-student')) {
            $classes = Auth::user()->joinedClasses();
        } else if (Gate::allows('is-teacher')) {
            $classes = Auth::user()->createdClasses();
        } else if (Gate::allows('is-admin')) {
            $classes = CourseClass::orderBy('id');
        } else {
            return redirect()->route('login');
        }

        if ($request->has('search')) {
            $classes = $classes->where('name', 'like', '%' . $request->search . '%');
        }

        $classes = $classes->paginate(9);

        return view('course-classes.index', [
            'classes' => $classes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        if (!(Gate::allows('is-teacher') || Gate::allows('is-admin'))) {
            abort(403);
        }
        $courses = Course::all();
        $mySyllabi = Syllabus::where('creator_user_id', Auth::id())->get();
        return view('course-classes.create', [
            'courses' => $courses,
            'syllabi' => $mySyllabi,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'course_id' => 'required|integer',
            'syllabus_id' => 'required|integer',
            'thumbnail_img' => 'nullable|image|mimes:png,jpg,jpeg,svg',
        ]);

        $courseClass = new CourseClass();
        $courseClass->name = $validateData['name'];
        $courseClass->course_id = $validateData['course_id'];
        $courseClass->syllabus_id = $validateData['syllabus_id'];
        $courseClass->creator_user_id = Auth::user()->id;

        if ($request->hasFile('thumbnail_img')) {
            $courseClass->thumbnail_img = $request->file('thumbnail_img')->store('public/thumbnail');
        }

        $courseClass->save();
        $classesId = $courseClass->id;

        $hashids = new Hashids('', 5);

        $classCode = $hashids->encode($classesId);

        CourseClass::where('id', $classesId)->update([
            'class_code' => $classCode,
        ]);

        return redirect()->route('classes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $courseClassId
     * @return Application|Factory|View
     */
    public function show($courseClassId)
    {
        if (Gate::allows("is-student")) {
            $class = Auth::user()->joinedClasses()->where('course_class_id', $courseClassId)->first();
        } else if (Gate::allows("is-teacher")) {
            $class = Auth::user()->createdClasses()->where('id', $courseClassId)->first();
        } else if (Gate::allows("is-admin")) {
            $class = CourseClass::where('id', $courseClassId)->first();
        } else {
            abort(403);
        }

        if ($class == null) {
            abort(404);
        }

        return view('course-classes.show', [
            'courseClass' => $class,
            'assignments' => $class->assignments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(CourseClass $class)
    {
        if (!(Gate::allows('is-teacher') || Gate::allows('is-admin'))) {
            abort(403);
        }

        $courses = Course::all();
        return view('course-classes.edit', [
            'class' => $class,
            'courses' => $courses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CourseClass $class
     * @return RedirectResponse
     */
    public function update(Request $request, CourseClass $class)
    {
        if (!(Gate::allows('is-teacher') || Gate::allows('is-admin'))) {
            abort(403);
        }

        $validateData = $request->validate([
            'name' => 'required|string',
            'course_id' => 'required|integer',
//            'syllabus_id' => 'required|integer',
            'thumbnail_img' => 'nullable|image|mimes:png,jpg,jpeg,svg',
        ]);
        if ($request->hasFile('thumbnail_img')) {
            $validateData['thumbnail_img'] = $request->file('thumbnail_img')->store('public/thumbnail');
        }

        $class->name = $validateData['name'];
        $class->course_id = $validateData['course_id'];
//        $class->syllabus_id = $validateData['syllabus_id'];
        if ($request->hasFile('thumbnail_img')) {
            $class->thumbnail_img = $validateData['thumbnail_img'];
        }
        $class->save();

        return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CourseClass $class
     * @return RedirectResponse
     */
    public function destroy(CourseClass $class)
    {
        $class->delete();
        return back();
    }

    public function show_join()
    {
        return view('course-classes.show_join');
    }

    public function join(Request $request)
    {
        if (!(Gate::allows('is-student'))) {
            abort(403);
        }

        $validated = $request->validate([
            'class_code' => 'required|string'
        ]);

        $classesCourseId = CourseClass::where('class_code', $validated['class_code'])->value('id');

        if ($classesCourseId == null) {
            $errorMessage = 'Kelas tidak ditemukan';
            return view('course-classes.fail_join', [
                'errorMessage' => $errorMessage,
            ]);
        }

        $studentUserId = Auth::user()->id;

        $joinClassExist = DB::table('join_classes')->where('course_class_id', $classesCourseId)->where('student_user_id', $studentUserId)->first();

        if ($joinClassExist != null) {
            $errorMessage = 'Anda sudah bergabung dengan kelas ini';
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
