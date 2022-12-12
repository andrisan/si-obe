<?php

namespace App\Http\Controllers;

use App\Models\IntendedLearningOutcome;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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
       $ilos = IntendedLearningOutcome::where('syllabus_id', $syllabus)->orderBy('position')->paginate(3);
       return view('intended-learning-outcomes.index',[
            'syllabus' => $syllabus,
            'ilos' => $ilos
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
        'position'=> 'required|numeric',
        'description'=> 'required|string',
    ]);
        $syllabus->intentedLearningOutcomes()->create($validateData);

        return redirect()-> route ('syllabi.ilos.index',[
        'syllabus' => $syllabus,
    ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Syllabus $syllabus, Request $request)
    {
         $ilo = IntendedLearningOutcome::find($request->ilo);
         return view ('intended-learning-outcomes.show',[
        'syllabus' => $syllabus,
        'ilo' => $ilo,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $intendedLearningOutcome
     * @return \Illuminate\Http\Response
     */
    public function edit($syllabus,IntendedLearningOutcome $ilo)
    {
        // return view('intended-learning-outcomes.edit');
        return view ('intended-learning-outcomes.edit',[
            'syllabus' => $syllabus,
            'ilo'   => $ilo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Syllabus $syllabus
     * @param IntendedLearningOutcome $intendedLearningOutcome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $syllabus, IntendedLearningOutcome $ilo)
    {

        $validateData = $request->validate([
        'position'=> 'required|numeric',
        'description'=> 'required|string',
    ]);
        $ilo->update($validateData);

        return redirect()-> route ('syllabi.ilos.index',[
        'syllabus' => $syllabus,
    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     */
    public function destroy($id)
    {
        DB::table('intended_learning_outcomes')->where('id',$id)->delete();
        return back();
    }
}
