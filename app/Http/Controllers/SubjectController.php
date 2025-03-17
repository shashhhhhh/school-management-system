<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.subject.form');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);

        $subject = new Subject();
        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->save();
        return redirect()->route('subject.create')->with('success', 'Subject added successfully');

    }

    public function read()
    {
        $data['subjects']=Subject::latest()->get();

        return view('admin.subject.table',$data);
    }

    public function delete($id)
    {
        $data = Subject::find($id);
        $data->delete();
        return redirect()->route('subject.read')->with('success','Subject Deleted Successfully');
    }

    public function edit($id)
    {
        $data['subject']=Subject::find($id);
        return view('admin.subject.edit_form',$data);

    }

    public function update(Request $request,$id)
    {
        $subject = Subject::find($id);
        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->update();
        return redirect()->route('subject.read')->with('success','Subject Updated Successfully');

    }


}
