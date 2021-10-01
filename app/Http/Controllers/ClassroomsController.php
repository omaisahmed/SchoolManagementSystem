<?php

namespace App\Http\Controllers;

use App\Models\Classrooms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassroomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('students.index');
        $classrooms = Classrooms::latest()->paginate(5);
    
        return view('classrooms.index',compact('classrooms'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('classrooms.create');
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
            'classroom_name'=> 'required',
            
            
        ]);

        Classrooms::create($request->all());
        return redirect()->route('classroom.index')->with('success','Classroom Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classrooms  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classrooms $classroom)
    {
        // return redirect()->route('students.index');
        return view('classrooms.show',compact('classroom'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classrooms  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classrooms $classroom)
    {
        return view('classrooms.edit',compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classrooms  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classrooms $classroom)


    {

        $request->validate([
            'classroom_name'=> 'required',
           
            
        ]);

        Classrooms::where('id', $classroom->id)
        ->update([
            'classroom_name' => $request->input('classroom_name'),
        
            
        ]);
        // Students::update($request->all());
        return redirect()->route('classroom.index')->with('success','Classroom Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classrooms  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classrooms $classroom)
    {
        $classroom->delete();
        return redirect()->route('classroom.index')->with('success','Classroom Deleted Successfully!');
    }
}