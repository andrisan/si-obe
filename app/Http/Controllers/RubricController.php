<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RubricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rubrics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Rubric $rubric)
    {
        $rub = new Rubric();
        $rub->title = $rubric->title; 
    }

    /**
     * Display the specified resource.
     *
     * @param  Rubric $rubric
     * @return \Illuminate\Http\Response
     */
    public function show(Rubric $rubric)
    {
        return view( 'rubrics.show', [
            'rubric' => $rubric
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Rubric $rubric
     * @return \Illuminate\Http\Response
     */
    public function edit(Rubric $rubric)
    {
        return view('rubric.edit', [
            'rubric' => $rubric
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Rubric $rubric
     * @param  Rubric $rubric
     * @return \Illuminate\Http\Response
     */
    public function update(Rubric $rubric)
    {
        $rubric->update(['title' => $rubric->title] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Rubric $rubric
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rubric $rubric)
    {
        //
    }
}
