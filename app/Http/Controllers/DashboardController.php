<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseClass;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\StudyProgram;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $user = auth()->user();

        if (Gate::allows('is-admin')) {
            $facultiesCount = Faculty::count();
            $departmentsCount = Department::count();
            $studyProgramsCount = StudyProgram::count();
            $courses = Course::all();
            return view('home', compact(
                'user',
                'facultiesCount',
                'departmentsCount',
                'studyProgramsCount',
                'courses'
            ));
        } else if (Gate::allows('is-teacher')) {
            $classes = CourseClass::where('creator_user_id', $user->id)->get();
            return view('home', compact(
                'classes',
                'user'
            ));
        } else if (Gate::allows('is-student')) {
            $classes = CourseClass::whereHas('students', function ($query) use ($user) {
                $query->where('student_user_id', $user->id);
            })->get();

            return view('home', compact('user', 'classes'));
        }
    }
}
