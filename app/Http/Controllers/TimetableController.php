<?php

namespace App\Http\Controllers;

use App\Models\Timetable;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Day;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['days'] = Day::all();
        $data['classes'] = Classes::all();
        $data['subjects'] = Subject::all();
        return view('admin.timetable.create', $data);
    }

    public function store(Request $req)
    {
        $class_id = $req->class_id;
        $subject_id = $req->subject_id;
        foreach ($req->timetable as $timetable) {
            $day_id = $timetable['day_id'];
            $start_time = $timetable['start_time'];
            $end_time = $timetable['end_time'];
            $room_no = $timetable['room_no'];
            if($start_time != null){
                Timetable::updateOrCreate(
                    [
                        'class_id' => $class_id,
                        'subject_id' => $subject_id,
                        'day_id' => $day_id,
                    ],
                    [
                        'start_time' => $start_time,
                        'end_time' => $end_time,
                        'room_no' => $room_no,
                    ]
                );
            }
        }

        return redirect()->route('timetable.create')->with('success', 'Timetable Created Successfully');
    }

    public function read(Request $req)
    {   
        $data['classes'] = Classes::all();
   
        $tabletimes = Timetable::with(['class','subject','day']);
        if($req->class_id){
            $tabletimes->where('class_id',$req->class_id);
        }
        if($req->subject_id){
            $tabletimes->where('subject_id',$req->subject_id);
        }
        $data['tabletimes'] = $tabletimes->get();
        return view('admin.timetable.list',$data);
    }

    public function delete($id)
    {
        $data = Timetable::find($id);
        $data->delete();
        return redirect()->route('timetable.read')->with('success','Timetable deleted Successfully');
    }


    public function update(Request $request, Timetable $timetable)
    {
        //
    }
}