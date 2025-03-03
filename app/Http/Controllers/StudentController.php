<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Classes;
use Illuminate\Http\Request;

class StudentController extends Controller
{
   public function index(){

        //$data['classses']= Classes::all();
        $data['academic_years']= AcademicYear::all();
       return view('admin.student.student',$data);
   }
    public function store(Request $request){
       echo "ok";
    }
}
