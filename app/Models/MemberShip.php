<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Idea;

class MemberShip extends Model
{
    use HasFactory;
    
    public function post(){
        return $this->belongsTo(Idea::class,'post_id','id');
    }
}
