<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignby extends Model
{
    use HasFactory;

    function proposal_info(){
    	return $this->belongsTo(Proposal::class,'proposal_id');
    }
}
