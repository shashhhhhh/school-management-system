<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.announcement.form');
    }


    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'type' => 'required'
        ]);
       $announcement = new Announcement();
       $announcement->message = $request->message;
       $announcement->type = $request->type;
       $announcement->save();
       return redirect()->route('announcement.create')->with('success','Announcement Broadcast successfully');
    }

    /**
     * Display the specified resource.
     */
    public function read(Announcement $announcement)
    {
        $data['announcements'] = Announcement::latest()->get();
        return view('admin.announcement.list',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['announcement'] = Announcement::find($id);
        return view('admin.announcement.edit_form',$data);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $announcement = Announcement::find($id);
        $announcement->message = $request->message;
        $announcement->type = $request->type;
        $announcement->update();
        return redirect()->route('announcement.read')->with('success','Announcement Broadcast Details Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $announcement = Announcement::find($id);
        $announcement->delete();
        return redirect()->route('announcement.read')->with('success','Announcement Broadcast Deleted successfully');
    }
}
