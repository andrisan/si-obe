<?php

namespace App\Http\Controllers;

use App\Models\LessonLearningOutcome;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', ['user'=> $user]);
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
