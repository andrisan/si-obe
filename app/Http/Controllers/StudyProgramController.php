<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\StudyProgram;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class StudyProgramController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(StudyProgram::class, 'study_program');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Faculty $faculty, Department $department )
    {
        return view('study-programs.index',[
            'faculty'=>$faculty,
            'department'=>$department,
            'studyPrograms'=>$department->studyPrograms()->paginate(10)
        ]);
    }

    public function show(Faculty $faculty, Department $department, StudyProgram $studyProgram){
        abort(404);
    }

   /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
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
     * @param Request $request
     * @return RedirectResponse
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
     * Show the form for editing the specified resource.
     *
     * @param Faculty $faculty
     * @param Department $department
     * @param StudyProgram $studyProgram
     * @return Application|Factory|View
     */
    public function edit(Faculty $faculty, Department $department, StudyProgram $studyProgram)
    {
        return view('study-programs.edit', [
            'faculty' => $faculty,
            'department' => $department,
            'studyProgram' => $studyProgram
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Faculty $faculty
     * @param Department $department
     * @param StudyProgram $studyProgram
     * @return RedirectResponse
     */
    public function update(Request $request, Faculty $faculty, Department $department, StudyProgram $studyProgram): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        $studyProgram->update($validated);


        return redirect()->route('faculties.departments.study-programs.index', [
            'faculty' => $faculty,
            'department' => $department
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Faculty $faculty
     * @param Department $department
     * @param StudyProgram $studyProgram
     * @return RedirectResponse
     */
    public function destroy(Faculty $faculty, Department $department, StudyProgram $studyProgram)
    {
        $studyProgram->delete();

        return redirect()->route('faculties.departments.study-programs.index', [
            'faculty' => $faculty,
            'department' => $department
        ]);
    }
}
