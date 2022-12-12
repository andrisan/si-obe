<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\CriteriaLevel;
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
        
        $llos = LessonLearningOutcome::all();
        return view('criteria.create', [
            'rubric' => $rubric,
            'llos' => $llos
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
        // $validated = $request->validate([
        //     //
        //     'llo' => 'required|string',
        //       'title' => 'required|string',
        //       'description' => 'required|string',
        //       'max_point' => 'required|string',
        //   ]);
  
        //   dd($validated);
        //   $rubric->criterias()->create($validated);

          $validated = $request->validate([
            'title' => 'required|string',
              'llo' => 'required|string',
              'description' => 'required|string',   
        ]);

        $criteria = new Criteria();
        $criteria->rubric_id = $rubric->id;
        $criteria->llo_id = $validated['llo'];
        $criteria->title = $validated['title'];
        $criteria->description = $validated['description'];
        $criteria->max_point = 6.25;
        $criteria->save();
  
          return redirect()->route('rubrics.criterias.index',[
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
    public function edit(Rubric $rubric, $criterias)
    {
        //
        $llos = LessonLearningOutcome::all();
        $criterias= Criteria::where('id', $criterias)->first();
        
          return view('criteria.edit',[
            'rubric' => $rubric,
            'criterias' => $criterias,
            'llos' => $llos
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rubric $rubric, Criteria $criteria)
    {
        //
        $validated = $request->validate([
            //
              'title' => 'required|string',
              'description' => 'required|string',
              'llo' => 'required|string'
          ]);

          $criteria->update([
            'title' => $validated['title'],
            'llo_id' =>  $validated['llo'],
            'description' => $validated['description']
        ]);
  
          return redirect()->route('rubrics.criterias.show',[$rubric, $criteria]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rubric, $criterias)
    {
        $del = Criteria::where('id', $criterias)->delete();

        return redirect()->route('rubrics.criterias.index',[
            'rubric' => $rubric
        ]);
    }

}