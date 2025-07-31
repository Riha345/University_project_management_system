<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    function dept_info(){
    	return $this->belongsTo(Depertment::class,'depertment_id');
    }

    function course_info(){
    	return $this->belongsTo(Course::class,'course_id');
    }
    function teacher_info(){
    	return $this->belongsTo(Teacher::class,'teacher_id');
    }
}
