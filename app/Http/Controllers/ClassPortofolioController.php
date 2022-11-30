<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseClass;

class ClassPortofolioController extends Controller
{
    public function index(CourseClass $courseClass)
    {
        return view('class-portofolio.index', [
            'cc' => $courseClass
        ]);
    }

    public function student(CourseClass $courseClass)
    {
        return view('class-portofolio.student', [
            'cc' => $courseClass
        ]);
    }
}
