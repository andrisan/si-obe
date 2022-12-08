<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;




class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Faculty $faculty)
    {
        //
        $faculties = Faculty::all();

        return view('departments.index',[
            'faculty'=>$faculty,
            'faculties'=>$faculties,
            'departments'=>$faculty->departments()->paginate(10)

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Faculty $faculty)
    {
        //


         $department = Department::where('faculty_id', $faculty)->orderBy('faculty_id')->get();
        return view('departments.create', [
            'faculty' => $faculty
                        
                       
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Faculty  $faculty)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        
        ]);
        $faculty->departments()->create($validated);
        return redirect()->route(
            'faculties.departments.index',$faculty
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Faculty $faculty
     * @param Department $department
     * @return Response
     */
    public function show(Faculty $faculty, Department $department)
    {



        return view('faculties.departments.index', [

            'department' => $department,
            'faculty' => $faculty
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($faculty, Department $department)
    {
        //


     
        
        return view('departments.edit', [
            'department' => $department,
            'faculty' => $faculty,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $faculty, Department $department)
    {
        //
       $validated = $request->validate([
        'name' => 'required|string'
       ]);

       $department->update($validated);
        return redirect()->route('faculties.departments.index', $faculty);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($faculty, Department $department)
    {
        //

        $department->delete();
        return redirect()->route('faculties.departments.index', [
            'department' => $department,
            'faculty' => $faculty,
        ]);
    }
}
