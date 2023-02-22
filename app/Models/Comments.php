<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Comments extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Idea::class, 'idea_id', 'id');
    }

    public function reply(){
        return $this->hasMany(Self::class, 'parent_id', 'id');
    }
    
    public function parents(){
        
    }
}
