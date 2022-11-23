<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;



class StudyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Faculty $faculty, Department $department, )
    {
        return view('study-programs.index',[
            'faculty'=>$faculty,
            'department'=>$department,
            'studyPrograms'=>$department->studyPrograms()->paginate(3)
        ]);
    }

   
}
