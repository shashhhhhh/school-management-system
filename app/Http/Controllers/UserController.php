public function mySubject()
{
    $class_id -= Auth:: guard('students')-> user()->class_id;
    $data['my_subjects'] = AssignTeacherToCLass::where('class_id',$class_id)->with('subject','teacher')->get();
    return view('student.my_subject',$data);
}