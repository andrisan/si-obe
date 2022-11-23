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

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Faculty $faculty, Department $department)
    {
        return view('study-programs.create',[
            'faculty'=>$faculty,
            'department'=>$department,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Faculty $faculty, Department $department)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        
        ]);

        $department->studyPrograms()->create($validated);

        return redirect()->route('faculties.departments.study-programs.index', [
            'faculty' => $faculty,
            'department' => $department,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty, Department $department, StudyProgram $studyProgram)
    {
        ddd($faculty, $department, $studyProgram);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty, Department $department, StudyProgram $studyProgram)
    {
        //
        return view('study-programs.edit', [
            'faculty' => $faculty,
            'department' => $department,
            'studyProgram' => $studyProgram
        ]);
    }

    
}
