<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Classes;
use App\Models\Subject;

class AssignTeacherToClass extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id','subject_id','teacher_id'
    ];
}
