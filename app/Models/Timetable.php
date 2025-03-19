<?php

namespace App\Models;

use App\Models\Day;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id', 'subject_id', 'day_id', 'start_time', 'end_time', 'room_no'
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function day()
    {
        return $this->belongsTo(Day::class, 'day_id');
    }
}