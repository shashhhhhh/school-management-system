<?php

namespace App\Http\Controllers;

use App\Models\AssignTeacherToClass;
use App\Models\AssignSubjectToClass;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;



class AssignTeacherToClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['classes'] = Classes::all();
        $data['teachers'] = User::where('role', 'teacher')->latest()->get();
        return view('admin.assign_teacher.form', $data);
    }

    public function findSubject(Request $request)
    {
        $class_id = $request->class_id;
        $subjects = AssignSubjectToClass::with('subject')->where('class_id', $class_id)->get();
        return response()->json([
            'status'=>true,
            'subjects'=>$subjects
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'subject_id' => 'required',
            'teacher_id' => 'required',
        ]);

        AssignTeacherToClass::updateOrCreate(
            [
                'class_id' => $request->class_id,
                'subject_id' => $request->subject_id
            ],
            [
                'class_id' => $request->class_id,
                'subject_id' => $request->subject_id,
                'teacher_id' => $request->teacher_id
            ]
        );

        return redirect()->route('assign-teacher.create')->with('success', 'Teacher assigned successfully');
    }

    /**
     * Display the specified resource.
     */
    public function read(Request $request)
    {
        $data['classes'] = Classes::all();
        $assign_teachers = AssignTeacherToClass::with(['class','subject','teacher']);
        if($request->class_id){
            $assign_teachers->where('class_id',$request->class_id);
        }

        $assign_teachers = $assign_teachers->latest()->get();
        $data['assign_teachers'] = $assign_teachers;
        return view('admin.assign_teacher.list',$data);
    }


    public function delete($id)
    {
        $res = AssignTeacherToClass::find($id);
        $res->delete();
        return redirect()->back()->with('success','Teacher assign to a class Deleted Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $res = AssignTeacherToClass::find($id);
        $data['assign_teacher'] = $res;
        $data['subjects'] = AssignSubjectToClass::with('subject')->where('class_id',$res->class_id)->get();
        // dd($data['subjects']);
        $data['classes'] = Classes::all();

        $data['teachers'] = User::where('role', 'teacher')->latest()->get();
        return view('admin.assign_teacher.edit_form',$data);
    }

    public function update(Request $request,$id)
    {
        $res = AssignTeacherToClass::find($id);
        $res->class_id = $request->class_id;
        $res->subject_id = $request->subject_id;
        $res->teacher_id = $request->teacher_id;
        $res->update();
        return redirect()->route('assign-teacher.read')->with('success', 'Teacher Assigned Updated successfully');
    }
    


}
