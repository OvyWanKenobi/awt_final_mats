<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    public $timestamps = false;

    public function instructorofcourse(){
        return $this->belongsTo(Instructor::class,'c_instructor_fk');
    }

    public function studentsincourse(){
        return $this->hasMany(Student_course::class,'c_id');
    }

    public function ratingsofcourse(){
        return $this->hasMany(Rating::class,'c_id');
    }

    public function topics(){
        return $this->hasMany(Topic::class,'t_course_fk');
    }

    public function forums(){
        return $this->hasMany(Forum::class,'c_id');
    }

    //mridul

    public function students(){
        return $this->hasMany(Student_course::class,'c_id');
    }

}
