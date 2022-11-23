<?php

namespace App\Http\Controllers;

use App\Models\IntendedLearningOutcome;
use App\Models\Syllabus;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class IntendedLearningOutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($syllabus)
    {
        $ilo = IntendedLearningOutcome::where('syllabus_id', $syllabus)->orderBy('position')->get();
       return view('intended-learning-outcomes.index',[
            'syllabus' => $syllabus,
            'ilo' => $ilo
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Syllabus $syllabus)
    {
        return view('intended-learning-outcomes.create',[
            'syllabus' =>$syllabus
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Syllabus $syllabus)
    {
        $validateData = $request->validate([
        'position'=> 'required',
        'description'=> 'required',
    ]);
        $syllabus->intentedLearningOutcomes()->create($validateData);

        return redirect()-> route ('syllabi.ilos.index',[
        'syllabus' => $syllabus,
    ]);
    }