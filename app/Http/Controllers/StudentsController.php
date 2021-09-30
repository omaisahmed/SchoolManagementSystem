<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Students;
use App\Models\Users;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('students.index');
        $students = Students::latest()->paginate(5);
    
        return view('students.index',compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ClassStudent = Classes::all();
         return view('students.create' , ['ClassStd' => $ClassStudent]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Students $student, Users $user)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=> 'required',
            'email'=> 'required',
            // 'password'  =>  'required|min:8|confirmed',
            // 'confirm_password'  =>  'required|min:8|confirmed',
            'class'=> 'required',
            'section'=> 'required',
            'phone'=> 'required',
            'gender'=> 'required',
            'dob'=> 'required',
            'address'=> 'required',

        ]);

        $file = $request->file('image');     
        $filename = time(). '.' . $file->getClientOriginalExtension();
        $file->storeAs('images/students' , $filename);
        $path = $file->storeAs('' , $filename);


        Students::where('id', $student->id)
        ->insert([
            'image' => $path,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'confirm_password' => $request->input('confirm_password'),
            'class' => $request->input('class'),
            'section' => $request->input('section'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'dob' => $request->input('dob'),
            'address' => $request->input('address'),
            
        ]);

        //  Users::create($request->all());
        Users::where('id', $user->id)
        ->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'Student', 
              
        ]);

         

         
 
        // Teachers::create($request->all());
    
    //     $password = $request -> password; // password is form field
    //    $hashed = Hash::make($password);

        // $request->teachers()->fill([
        //     'password' => Hash::make($request->newPassword)
        // ])->save();
        // $password = request('password'); // get the value of password field
        // $hashed = Hash::make($password); // encrypt the password
        return redirect()->route('students.index')->with('success','Student Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $student)
    {
        // return redirect()->route('students.index');
        return view('students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $student)
    {
        // Users::where('id', $user->id)
        // ->update([
         
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'password' => Hash::make($request->input('password')),
        //     'role' => 'Teacher', 
            
        // ]);
        // $user = Users::all();
        //  $user = Teachers::find($teacher->id);
        $ClassStudent = Classes::all();
        return view('students.edit', ['ClassStd' => $ClassStudent], compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $student, Users $user)
    {

        
        Users::where('id', $user->id)
        ->update([
         
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'Student', 
            
        ]);


        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=> 'required',
            'email'=> 'required',
            // 'password'  =>  'required|min:8|confirmed',
            // 'confirmPassword'  =>  'required|min:8|confirmed',
            'class'=> 'required',
            'section'=> 'required',
            'phone'=> 'required',
            'gender'=> 'required',
            'dob'=> 'required',
            'address'=> 'required',

        ]);

        $file = $request->file('image');     
        $filename = time(). '.' . $file->getClientOriginalExtension();
        $file->storeAs('images/students' , $filename);
        $path = $file->storeAs('' , $filename);

        Students::where('id', $student->id)
        ->update([
    
            'image' => $path,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'confirm_password' => $request->input('confirm_password'),
            'class' => $request->input('class'),
            'section' => $request->input('section'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'dob' => $request->input('dob'),
            'address' => $request->input('address'),
            
        ]);



        // Teachers::update($request->all());
        return redirect()->route('students.index')->with('success','Student Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success','Student Deleted Successfully!');
    }
}