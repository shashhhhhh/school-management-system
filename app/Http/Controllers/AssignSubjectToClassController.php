<?php

namespace App\Http\Controllers;

use App\Models\AssignSubjectToClass;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Subject;

class AssignSubjectToClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['classes'] = Classes::all();
        $data['subjects'] = Subject::all();
        return view('admin.assign_subject.form', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'subject_id' => 'required',
        ]);

        $class_id = $request->class_id;
        $subject_ids = $request->subject_id;

        foreach ($subject_ids as $subject_id) {
            AssignSubjectToClass::updateOrCreate(
                [
                    'class_id' => $class_id,
                    'subject_id' => $subject_id
                ],
                [
                    'class_id' => $class_id,
                    'subject_id' => $subject_id
                ]
            );
        }
        return redirect()->route('assign-subject.read')->with('success', 'Subject assigned to class Added successfully');

    }


    public function read(Request $request)
    {
        $query = AssignSubjectToClass::with(['class','subject']);
        if($request->filled('class_id')){
            $query->where('class_id', $request->get('class_id'));
        }
        $data['assign_subjects'] = $query->get();
        $data['classes'] = Classes::all();
        return view('admin.assign_subject.table',$data);
    }

    public function delete($id)
    {
        $data = AssignSubjectToClass::find($id);
        $data->delete();
        return redirect()->back()->with('success','Subject assigned to a class Deleted Successfully');
    }

    public function edit($id){
        $data['assign_subject'] = AssignSubjectToClass::find($id);
        $data['classes'] = Classes::all();
        $data['subjects'] = Subject::all();
        return view('admin.assign_subject.edit_form',$data);
    }

    public function update(Request $request,$id)
    {
        $assign_subject = AssignSubjectToClass::find($id);
        $assign_subject->class_id = $request->class_id;
        $assign_subject->subject_id = $request->subject_id;
        $assign_subject->update();
        return redirect()->route('assign-subject.read')->with('success', 'Subject assigned to class Updated successfully');
    }

}
