<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Teachers;
use App\Models\Users;
use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('students.index');
        $teachers = Teachers::latest()->paginate(5);
    
        return view('teachers.index',compact('teachers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $TeacherDepart = Departments::all();
         return view('teachers.create', ['TeacherDept' => $TeacherDepart]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Teachers $teacher, Users $user)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=> 'required',
            'email'=> 'required',
            // 'password'  =>  'required|min:8|confirmed',
            // 'confirm_password'  =>  'required|min:8|confirmed',
            'designation'=> 'required',
            'department'=> 'required',
            'phone'=> 'required',
            'gender'=> 'required',
            'dob'=> 'required',
            'address'=> 'required',

        ]);

        $file = $request->file('image');     
        $filename = time(). '.' . $file->getClientOriginalExtension();
        $file->storeAs('images/teachers' , $filename);
        $path = $file->storeAs('' , $filename);


        Teachers::where('id', $teacher->id)
        ->insert([
            'image' => $path,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'confirm_password' => $request->input('confirm_password'),
            'designation' => $request->input('designation'),
            'department' => $request->input('department'),
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
            'role' => 'Teacher', 
              
        ]);

         

         
 
        // Teachers::create($request->all());
    
    //     $password = $request -> password; // password is form field
    //    $hashed = Hash::make($password);

        // $request->teachers()->fill([
        //     'password' => Hash::make($request->newPassword)
        // ])->save();
        // $password = request('password'); // get the value of password field
        // $hashed = Hash::make($password); // encrypt the password
        return redirect()->route('teachers.index')->with('success','Teacher Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teachers  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Teachers $teacher)
    {
        // return redirect()->route('students.index');
        return view('teachers.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Teachers $teacher)
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
        $TeacherDepart = Departments::all();
        return view('teachers.edit', ['TeacherDept' => $TeacherDepart], compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teachers  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teachers $teacher, Users $user)
    {

        
        Users::where('id', $user->id)
        ->update([
         
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'Teacher', 
            
        ]);


        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=> 'required',
            'email'=> 'required',
            // 'password'  =>  'required|min:8|confirmed',
            // 'confirmPassword'  =>  'required|min:8|confirmed',
            'designation'=> 'required',
            'department'=> 'required',
            'phone'=> 'required',
            'gender'=> 'required',
            'dob'=> 'required',
            'address'=> 'required',

        ]);

        $file = $request->file('image');     
        $filename = time(). '.' . $file->getClientOriginalExtension();
        $file->storeAs('images/teachers' , $filename);
        $path = $file->storeAs('' , $filename);

        Teachers::where('id', $teacher->id)
        ->update([
    
            'image' => $path,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'confirm_password' => $request->input('confirm_password'),
            'designation' => $request->input('designation'),
            'department' => $request->input('department'),
            'phone' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'dob' => $request->input('dob'),
            'address' => $request->input('address'),
            
        ]);



        // Teachers::update($request->all());
        return redirect()->route('teachers.index')->with('success','Teacher Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teachers  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teachers $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success','Teacher Deleted Successfully!');
    }
}