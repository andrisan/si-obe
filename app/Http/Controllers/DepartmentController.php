<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Faculty $faculty)
    {
        return view('departments.index', [
            'departments' => $faculty->departments()->paginate(10),
            'faculty' => $faculty
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Faculty $faculty)
    {
        return view('departments.create', [
            'faculty' => $faculty
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function store(Request $request, Faculty $faculty)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);
        $faculty->departments()->create($validated);
        return redirect()->route('faculties.departments.index', $faculty);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Faculty $faculty
     * @param Department $department
     * @return Application|Factory|View
     */
    public function edit(Faculty $faculty, Department $department)
    {
        return view('departments.edit', [
            'department' => $department,
            'faculty' => $faculty,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Faculty $faculty
     * @param Department $department
     * @return RedirectResponse
     */
    public function update(Request $request, Faculty $faculty, Department $department)
    {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);
        $department->update($validated);
        return redirect()->route('faculties.departments.index', $faculty);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Faculty $faculty
     * @param Department $department
     * @return RedirectResponse
     */
    public function destroy(Faculty $faculty, Department $department)
    {
        $department->delete();
        return redirect()->route('faculties.departments.index', [
            'department' => $department,
            'faculty' => $faculty,
        ]);
    }
}
