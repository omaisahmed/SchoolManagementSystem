<?php

namespace App\Http\Controllers;

use App\Models\Syllabus;
use App\Models\Classes;
use App\Models\Subjects;
use Illuminate\Http\Request;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('students.index');
        $syllabuses = Syllabus::latest()->paginate(5);
    
        return view('syllabus.index',compact('syllabuses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $SyllabusClass = Classes::all();
         $SyllabusSubject = Subjects::all();
        return view('syllabus.create')->with('SyllabusCls',$SyllabusClass)->with('SyllabusSub',$SyllabusSubject);
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Syllabus $syllabus)
    {
        $request->validate([
            'title'=> 'required',
            'class'=> 'required',
            'section'=> 'required',
            'subject'=> 'required',
            'upload_syllabus'=> 'required|mimes:pdf,xlx,csv|max:2048',

        ]);

        $file = $request->file('upload_syllabus');     
        $filename = time(). '.' . $file->getClientOriginalExtension();
        $file->storeAs('attach_files/syllabus' , $filename);
        $path = $file->storeAs('' , $filename);

    
        Syllabus::where('id', $syllabus->id)
        ->insert([
            'title'=> $request->input('title'),
            'class'=> $request->input('class'),
            'section'=> $request->input('section'),
            'subject'=> $request->input('subject'),
            'upload_syllabus'=> $path,
            
        ]);

        return redirect()->route('syllabus.index')->with('success','Syllabus Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function show(Syllabus $syllabus)
    {
        return view('syllabus.show',compact('syllabus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function edit(Syllabus $syllabus)
    {
       
        $SyllabusClass = Classes::all();
        $SyllabusSubject = Subjects::all();
        return view('syllabus.edit', compact('syllabus'))->with('SyllabusCls',$SyllabusClass)->with('SyllabusSub',$SyllabusSubject);
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

        $request->validate([
            'title'=> 'required',
            'class'=> 'required',
            'section'=> 'required',
            'subject'=> 'required',
            'upload_syllabus'=> 'required|mimes:pdf,xlx,csv|max:2048',

        ]);

        $file = $request->file('upload_syllabus');     
        $filename = time(). '.' . $file->getClientOriginalExtension();
        $file->storeAs('attach_files/syllabus' , $filename);
        $path = $file->storeAs('' , $filename);

        Syllabus::where('id', $syllabus->id)
        ->update([
            'title'=> $request->input('title'),
            'class'=> $request->input('class'),
            'section'=> $request->input('section'),
            'subject'=> $request->input('subject'),
            'upload_syllabus'=> $path,
            
        ]);

        return redirect()->route('syllabus.index')->with('success','Syllabus Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Syllabus $syllabus)
    {
        $syllabus->delete();
        return redirect()->route('syllabus.index')->with('success','Syllabus Deleted Successfully!');
    }
}