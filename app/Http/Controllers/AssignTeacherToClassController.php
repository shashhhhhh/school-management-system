<?php

namespace App\Http\Controllers;

use App\Models\AssignTeacherToClass;
use App\Models\AssignSubjectToClass;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;

class AssignTeacherToClassController extends Controller
{
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
            'status' => true,
            'subjects' => $subjects,
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
                'subject_id' => $request->subject_id,
            ],
            [
                'teacher_id' => $request->teacher_id,
            ]
        );

        return redirect()->route('assign-teacher.create')->with('success', 'Teacher assigned successfully');
    }

    public function read(Request $request)
    {
        $data['classes'] = Classes::all();
        $assign_teachers = AssignTeacherToClass::with(['class', 'subject', 'teacher']);

        if ($request->class_id) {
            $assign_teachers->where('class_id', $request->class_id);
        }

        $data['assign_teachers'] = $assign_teachers->latest()->get();
        return view('admin.assign_teacher.list', $data);
    }

    public function delete($id)
    {
        $res = AssignTeacherToClass::find($id);
        if ($res) {
            $res->delete();
            return redirect()->back()->with('success', 'Teacher assignment deleted successfully');
        }
        return redirect()->back()->with('error', 'Assignment not found');
    }

    public function edit($id)
    {
        $res = AssignTeacherToClass::find($id);
        if (!$res) {
            return redirect()->back()->with('error', 'Assignment not found');
        }

        $data['assign_teacher'] = $res;
        $data['subjects'] = AssignSubjectToClass::with('subject')->where('class_id', $res->class_id)->get();
        $data['classes'] = Classes::all();
        $data['teachers'] = User::where('role', 'teacher')->latest()->get();

        return view('admin.assign_teacher.edit_form', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'class_id' => 'required',
            'subject_id' => 'required',
            'teacher_id' => 'required',
        ]);

        $res = AssignTeacherToClass::find($id);
        if (!$res) {
            return redirect()->back()->with('error', 'Assignment not found');
        }

        $res->update([
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
        ]);

        return redirect()->route('assign-teacher.read')->with('success', 'Teacher assignment updated successfully');
    }
}