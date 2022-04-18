<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
   
    public $timestamps = false;

    public function coursesinstudent(){
        return $this->hasMany(Student_course::class, 'st_id');
    }

//mridul
public function courses(){
    return $this->hasMany(Student_course::class,'st_id');
}

}
