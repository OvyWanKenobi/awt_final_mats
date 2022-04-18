<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userlogin extends Model
{
    use HasFactory;
    protected $table = 'userlogins';
    public $timestamps = false;

    public function forum(){
        return $this->hasMany(Forum::class, 'st_id');
    }

    public function forumcomment(){
        return $this->belongsTo(Forumcomment::class, 'fc_uid');
    }
}
