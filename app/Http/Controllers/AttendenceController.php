<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Students;
use App\Models\Attendences;
use App\Models\Classes;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ClassAttendence = Classes::all();
        $attendences = Attendences::latest()->paginate(5);
    
        return view('attendence.index', compact('attendences'))
            ->with('i', (request()->input('page', 1) - 1) * 5)->with('ClassAttd',$ClassAttendence);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
         return view('attendence.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Attendences $attendence)
    {
        $request->validate([
            'name'=> 'required',
            'status'=> 'required',
        ]);


        Attendences::where('id', $attendence->id)
        ->insert([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        
        ]);


        return redirect()->route('attendence.index')->with('success','Attendence Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendences  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Attendences $attendence)
    {

        $attendences = DB::select('select class,section from students');

        return view('attendence.show',['attendences' => $attendences], compact('attendence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendences  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendences $attendence)
    {
       
        $ClassStudent = Classes::all();
        return view('attendence.edit', ['ClassStd' => $ClassStudent], compact('attendence'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendences  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendences $attendence)
    {
        $request->validate([
            'name'=> 'required',
            'status'=> 'required',
        ]);

        Attendences::where('id', $attendence->id)
        ->update([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('attendence.index')->with('success','Attendence Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendences  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendences $attendence)
    {
        $student->delete();
        return redirect()->route('attendence.index')->with('success','Attendence Deleted Successfully!');
    }

    // public function search()
    // {
    //     $stds = DB::select('select * from attendence')->groupBy('class');

    //     return view('attendence.index', ['stds' => $stds]);
    // }

}