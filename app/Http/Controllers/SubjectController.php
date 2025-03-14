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


}
