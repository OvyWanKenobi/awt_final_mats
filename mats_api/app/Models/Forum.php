<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    protected $table = 'forums';
    public $timestamps = false;

    public function forumcomments(){
        return $this->hasMany(Forumcomment::class, 'fc_forum_fk');
    }
    
    public function course(){
        return $this->belongsTo(Course::class, 'c_id');
    }

    public function users(){
        return $this->belongsTo(Userlogin::class, 'st_id');
    }

    
}
