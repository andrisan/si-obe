<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseLearningOutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('course-learning-outcomes.index');
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
    // button create
    <input type="button" value="Create" class="btn btn-primary" id="create" onClick="document.location.href='some/page'" />
    <a href="<?php echo base_url('file controler/functionnya'); ?>" class="btn btn-primary btn-sm floatright">Create</a>

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
        return view('course-learning-outcomes.edit');
    }
    // button edit
    <input type="button" value="Edit" class="btn btn-primary" id="create" onClick="document.location.href='some/page'" />
    <a href="<?php echo base_url('file controler/functionnya'); ?>" class="btn btn-primary btn-sm floatright">Edit</a>

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
    // button delete
    <input type="button" value="Delete" class="btn btn-primary" id="create" onClick="document.location.href='some/page'" />
    <a href="<?php echo base_url('file controler/functionnya'); ?>" class="btn btn-primary btn-sm floatright">Delete</a>
}
