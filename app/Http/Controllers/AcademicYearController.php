<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.academic_year');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $data = new AcademicYear();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('academic-year.create')->with('success','Academic Year added Successfully');
    }

    public function read()
    {
        $data['academic_year']=AcademicYear::get();

        return view('admin.academic_year_list',$data);
    }

    
    public function delete($id)
    {
        $data = AcademicYear::find($id);
        $data->delete();
        return redirect()->route('academic-year.read')->with('success','Academic Year Deleted Successfully');
    }

    //edit stored resources

    public function edit($id)
    {
        $data['academic_year']=AcademicYear::find($id);
        return view('admin.edit_academic_year',$data);
    }

    /**
     * update the specified resource from storage.
     */
    public function update(Request $request)
    {
        $data = AcademicYear::find($request->id);
        $data->name = $request->name;
        $data->update();
        return redirect()->route('academic-year.read')->with('success','Academic Year Updated Successfully');
    }
}
