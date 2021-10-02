<?php

namespace App\Http\Controllers;

use App\Models\Classroutines;
use App\Models\Classes;
use App\Models\Subjects;
use App\Models\Teachers;
use App\Models\Classrooms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassroutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('students.index');
        $classroutines = Classroutines::latest()->paginate(5);
    
        return view('classroutines.index',compact('classroutines'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $ClassRoutineClass = Classes::all();
         $ClassRoutineSubject = Subjects::all();
         $ClassRoutineTeacher = Teachers::all();
         $ClassRoutineClassroom = Classrooms::all();
        return view('classroutines.create')->with('ClassRoutClass',$ClassRoutineClass)->with('ClassRoutSub',$ClassRoutineSubject)->with('ClassRoutTeach',$ClassRoutineTeacher)->with('ClassRoutClassroom',$ClassRoutineClassroom);
         
        //  $ClassRoutineClass = Classes::all();
        //  $ClassRoutineSubject = Subjects::all();
        //  $ClassRoutineTeacher = Teachers::all();
        //  $ClassRoutineClassroom = Classrooms::all();
        //  return view('classroutines.create', 
        //  ['ClassRoutClass' => $ClassRoutineClass], 
        //  ['ClassRoutSub' => $ClassRoutineSubject],
        //  ['ClassRoutTeach' => $ClassRoutineTeacher], 
        //  ['ClassRoutClassroom' => $ClassRoutineClassroom],
        
        // );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Classroutines $classroutine)
    {
        $request->validate([
            'class'=> 'required',
           'section'=> 'required',
           'subject'=> 'required',
           'teacher'=> 'required',
           'classroom'=> 'required',
           'day'=> 'required',
           'starting_hour'=> 'required',
           'ending_hour'=> 'required',
           'starting_minute'=> 'required',
           'ending_minute'=> 'required',

        ]);

    
        Classroutines::where('id', $classroutine->id)
        ->insert([
            'class' => $request->input('class'),
            'section' => $request->input('section'),
            'subject' => $request->input('subject'),
            'teacher' => $request->input('teacher'),
            'classroom' => $request->input('classroom'),
            'day' => $request->input('day'),
            'starting_hour' => $request->input('starting_hour'),
            'ending_hour' => $request->input('ending_hour'),
            'starting_minute' => $request->input('starting_minute'),
            'ending_minute' => $request->input('ending_minute'),
            
        ]);

        return redirect()->route('classroutine.index')->with('success','Class Routine Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroutines  $classroutine
     * @return \Illuminate\Http\Response
     */
    public function show(Classroutines $classroutine)
    {
        return view('classroutines.show',compact('classroutine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroutines  $classroutine
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroutines $classroutine)
    {
       
        $ClassRoutineClass = Classes::all();
         $ClassRoutineSubject = Subjects::all();
         $ClassRoutineTeacher = Teachers::all();
         $ClassRoutineClassroom = Classrooms::all();
       
        return view('classroutines.edit', compact('classroutine'))->with('ClassRoutClass',$ClassRoutineClass)->with('ClassRoutSub',$ClassRoutineSubject)->with('ClassRoutTeach',$ClassRoutineTeacher)->with('ClassRoutClassroom',$ClassRoutineClassroom);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classroutines  $classroutine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroutines $classroutine)
    {

        $request->validate([
            'class'=> 'required',
           'section'=> 'required',
           'subject'=> 'required',
           'teacher'=> 'required',
           'classroom'=> 'required',
           'day'=> 'required',
           'starting_hour'=> 'required',
           'ending_hour'=> 'required',
           'starting_minute'=> 'required',
           'ending_minute'=> 'required',

        ]);

        Classroutines::where('id', $classroutine->id)
        ->update([
            'class' => $request->input('class'),
            'section' => $request->input('section'),
            'subject' => $request->input('subject'),
            'teacher' => $request->input('teacher'),
            'classroom' => $request->input('classroom'),
            'day' => $request->input('day'),
            'starting_hour' => $request->input('starting_hour'),
            'ending_hour' => $request->input('ending_hour'),
            'starting_minute' => $request->input('starting_minute'),
            'ending_minute' => $request->input('ending_minute'),
            
        ]);

        return redirect()->route('classroutine.index')->with('success','Class Routine Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroutines  $classroutine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroutines $classroutine)
    {
        $classroutine->delete();
        return redirect()->route('classroutine.index')->with('success','Class Routine Deleted Successfully!');
    }
}