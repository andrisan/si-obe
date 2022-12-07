<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\Rubric;
use App\Models\LessonLearningOutcome;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($rubric)
    {
        $criteria = Criteria::where('rubric_id',$rubric)->get();
        return view('criteria.index', [
            'rubric' => $rubric,
            'criterias' => $criteria
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Rubric $rubric)
    {

        return view('criteria.create', [
            'rubric' => $rubric
        ]);      

        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Rubric $rubric )
    {
        $validated = $request->validate([
            //
              'title' => 'required|string',
               'llo' => 'required|string',
               'level' => 'required|string',
              'max_point' => 'required|double',
              'description' => 'required|string',
          ]);
  
          $rubric->criteria()->create($validated);
  
          return redirect()->route('rubrics.criterias.show',[
              'rubric'=> $rubric
          ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($rubric, $criterias)
    {
        $criterias = Criteria::with("LessonLearningOutcome")->where('rubric_id',$rubric)->find($criterias);
            return view('criteria.show', [
                'rubric' => $rubric,
                'criterias' => $criterias
            ]);
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
        return view('criteria.edit');
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


