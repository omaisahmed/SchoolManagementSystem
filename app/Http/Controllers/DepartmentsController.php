<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('students.index');
        $departments = Departments::latest()->paginate(5);
    
        return view('department.index',compact('departments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('department.create');
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
            'name'=> 'required',
            
            
        ]);

        Departments::create($request->all());
        return redirect()->route('department.index')->with('success','Department Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Departments $department)
    {
        // return redirect()->route('students.index');
        return view('department.show',compact('department'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departments  $Departments
     * @return \Illuminate\Http\Response
     */
    public function edit(Departments $department)
    {
        return view('department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departments  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departments $department)


    {

        $request->validate([
            'name'=> 'required',
           
            
        ]);

        Departments::where('id', $department->id)
        ->update([
            'name' => $request->input('name'),
        
            
        ]);
        // Students::update($request->all());
        return redirect()->route('department.index')->with('success','Department Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departments  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departments $department)
    {
        $department->delete();
        return redirect()->route('department.index')->with('success','Department Deleted Successfully!');
    }
}