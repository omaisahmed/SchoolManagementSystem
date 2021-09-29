<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Classes;
use App\Models\Subjects;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('students.index');
        $classes = Classes::latest()->paginate(5);
    
        return view('classes.index',compact('classes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'class'=> 'required',
            'section'=> 'required',
            
        ]);

        Classes::create($request->all());
        return redirect()->route('classes.index')->with('success','Class Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classes  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $class)
    {
        // return redirect()->route('students.index');
        return view('classes.show',compact('class'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classes  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $class)
    {
        return view('classes.edit',compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classes  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $class)


    {

        $request->validate([
            'class'=> 'required',
            'section'=> 'required',
            
        ]);

        Classes::where('id', $class->id)
        ->update([
            'class' => $request->input('class'),
            'section' => $request->input('section'),
            
        ]);
        // Students::update($request->all());
        return redirect()->route('classes.index')->with('success','Class Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classes  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Classes $class, Subjects $subject)
    {

        // Subjects::delete($request->all());

        Subjects::where('id', $subject->id)
        ->delete([
            'class' => $request->input('class'),
            'subject' => $request->input('subject'),
        
              
        ]);


        $class->delete();
        return redirect()->route('classes.index')->with('success','Class Deleted Successfully!');
    }
}