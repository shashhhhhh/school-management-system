<?php

namespace App\Http\Controllers;

use App\Models\AssignTeacherToClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        return view('admin.teacher.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'dob' => 'required',
            'mobno' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->mother_name = $request->mother_name;
        $user->dob = $request->dob;
        $user->mobno = $request->mobno;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'teacher';
        $user->save();

        return redirect()->route('teacher.create')->with('success', 'Teacher Saved Successfully');
    }

    public function read(Request $request)
    {
        $data['teachers'] = User::where('role', 'teacher')->latest()->get();
        return view('admin.teacher.table', $data);
    }

    public function edit($id)
    {
        $data['teacher'] = User::find($id);
        return view('admin.teacher.edit_form', $data);
    }

    public function update(Request $request, $id)
    {
        $teacher = User::find($id);
        $teacher->name = $request->name;
        $teacher->father_name = $request->father_name;
        $teacher->mother_name = $request->mother_name;
        $teacher->dob = $request->dob;
        $teacher->mobno = $request->mobno;
        $teacher->email = $request->email;
        $teacher->save(); // Use save() instead of update()

        return redirect()->route('teacher.read')->with('success', 'Teacher Updated Successfully');
    }

    public function delete($id)
    {
        $teacher = User::find($id);
        $teacher->delete();
        return redirect()->route('teacher.read')->with('success', 'Teacher Deleted Successfully');
    }

    public function login()
    {
        return view('teacher.login');
    }

    public function authenticate(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('teacher')->attempt(['email' => $req->email, 'password' => $req->password])) {
            if (Auth::guard('teacher')->user()->role != 'teacher') {
                Auth::guard('teacher')->logout();
                return redirect()->route('teacher.login')->with('error', 'Unauthorized user. Access denied!');
            }
            return redirect()->route('teacher.dashboard');
        } else {
            return redirect()->route('teacher.login')->with('error', 'Invalid email or password');
        }
    }

    public function dashboard()
    {
        return view('teacher.dashboard');
    }

    public function logout()
    {
        Auth::guard('teacher')->logout();
        return redirect()->route('teacher.login')->with('success', 'Logged out successfully!');
    }

    public function myClass()
    {
        $teacher_id = Auth::guard('teacher')->user()->id;
        $data['assign_class'] = AssignTeacherToClass::where('teacher_id', $teacher_id)
            ->with(['class', 'subject'])->get();
        
        return view('teacher.my_class', $data);
    }
};