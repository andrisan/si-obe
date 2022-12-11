<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseLearningOutcome;
use App\Models\IntendedLearningOutcome;
use App\Models\LessonLearningOutcome;
use App\Models\StudyProgram;
use App\Models\Syllabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        //
        if(Auth::user()->role!= 'admin'){
            return abort(403);
        }
        
        $course = Course::all();
        $syllabi = Syllabus::all();
        $ilos = IntendedLearningOutcome::all();
        return view('syllabi.index',[
            'course'=>$course,
            'syllabus'=>$syllabi,
            'ilos'=>$ilos
            
            
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
        $course= Course::all();
        return view('syllabi.create',[
            'course'=>$course
        ]
        
    );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Syllabus $syllabus)
    {
        //
        $validated = $request->validate([
            'title' => 'required|string',
            'head_of_study_program' => 'required|string',
            'author'=> 'required|string',
            'course_id'=>'required'
        ]);
       $syllabus = Syllabus::where('title', $validated['title'])->get();

        $syllabus = new Syllabus();
        $syllabus->title = $validated['title'];
        $syllabus->head_of_study_program = $validated['head_of_study_program'];
        $syllabus->author = $validated['author'];
       $syllabus->course_id=$validated['course_id'];
        $syllabus->save();
        return redirect()->route(
            'syllabi.index'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function show(Syllabus $syllabus)
    {
        //
        $syllabus = Syllabus::all();
        $ilos = IntendedLearningOutcome::all();
        $clo = CourseLearningOutcome::all();
        $llos = LessonLearningOutcome::all();
        return view('syllabi.show',[
        'syllabus'=>$syllabus,
        'ilos'=>$ilos,
        'clos'=>$clo,
        "llos"=>$llos
        ]
        );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function edit(Syllabus $syllabus)
    {
        //
        return view('syllabi.edit',[
            'syllabus'=>$syllabus
        ]
    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Syllabus $syllabus)
    {
        //
       $validated = $request->validate([
        'author'=>'required|string',
        'title'=>'required|string',
        'head_of_study_program'=>'required|string'
       ]);
       $syllabus->update($validated);

        return redirect()->route('syllabi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Syllabus $syllabus)
    {
        //
        $syllabus->delete();

        return redirect()->route('syllabi.index');
    }
}
