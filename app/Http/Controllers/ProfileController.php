<?php

namespace App\Http\Controllers;

use App\Models\LessonLearningOutcome;
use App\Models\StudentData;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return Application|Factory|View
     */
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', ['user'=> $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function create()
    {
        if (Auth::user()->role != 'student') {
            return redirect()->route('dashboard');
        }

        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id_number' => 'required|numeric',
        ]);

        $studentData = StudentData::where('student_id_number', $validated['student_id_number'])->first();
        if ($studentData == null){
            $studentData = new StudentData();
            $studentData->id = Auth::id();
        }
        $studentData->student_id_number = $validated['student_id_number'];
        $studentData->save();

        $user = Auth::user();
        $user->profile_completed = true;
        $user->save();

        return redirect()->route('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View
     */
    public function edit()
    {
        $user = Auth::user();
        if ($user->role == 'student'){
            $studentData = $user->studentData;
            return view('profile.edit_student', ['user'=> $user, 'studentData' => $studentData]);
        }

        return view('profile.edit', ['user'=> $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        if ($user->role == 'student'){
            $validated = $request->validate([
                'name' => 'required|string',
                'student_id_number' => 'required|numeric',
            ]);

            $studentData = $user->studentData;
            if ($studentData == null){
                $studentData = new StudentData();
                $studentData->id = Auth::id();
            }
            $studentData->student_id_number = $validated['student_id_number'];
            $studentData->save();
        } else {
            $validated = $request->validate([
                'name' => 'required|string',
            ]);
        }

        $user->name = $validated['name'];
        $user->save();

        return redirect()->route('profile.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function destroy()
    {
        abort(403);
    }

    public function grade()
    {
        $user = Auth::user();

        $nilaiAkhir =  0 ;
        $nilaiHuruf = null;
        foreach ($user->studentGrade as $data) {
            $nilaiAkhir += $data->criteriaLevel->point;
        }

        if ($nilaiAkhir > 80) {
            $nilaiHuruf = 'A';
        } elseif ($nilaiAkhir > 75) {
            $nilaiHuruf = 'B+';
        } elseif ($nilaiAkhir > 69) {
            $nilaiHuruf = 'B';
        } elseif ($nilaiAkhir > 60) {
            $nilaiHuruf = 'C+';
        } elseif ($nilaiAkhir > 55) {
            $nilaiHuruf = 'C';
        } elseif ($nilaiAkhir > 50) {
            $nilaiHuruf = 'D+';
        } elseif ($nilaiAkhir > 44) {
            $nilaiHuruf = 'D';
        } else {
            $nilaiHuruf = 'E';
        }

        $llo = LessonLearningOutcome::all();
        return view('profile.grade', [
            'user'=> $user,
            'grade' => $nilaiAkhir,
            'gradeLetter' => $nilaiHuruf,
            'llo' => $llo
        ]);
    }
}
