<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $faculties = Faculty::all();

        return view('faculties.index', [
            'faculties' => $faculties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        $faculty = new Faculty();
        $faculty->name = $validated['name'];
        $faculty->save();

        return redirect()->intended('faculties');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        // $studyPrograms = Department::where('faculty_id', $faculty->id)->get();
        $studyPrograms = StudyProgram::all();

        return view('faculties.show', [
            'faculty'=>$faculty,
            'departments'=>$faculty->departments()->orderBy('id')->paginate(2),
            'studyPrograms'=>$studyPrograms
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */

    public function edit(Faculty $faculty)
    {
        return view('faculties.edit', ['faculty'=>$faculty]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        $faculty->update([
            'name' => $validated['name']
        ]);
        
        return redirect(route('faculties.show', [$faculty]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();

        return back();
    }
}
