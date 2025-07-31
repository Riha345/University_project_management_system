<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    function dept_info(){
    	return $this->belongsTo(Depertment::class,'depertment_id');
    }
    
}
