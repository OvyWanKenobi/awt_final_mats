<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    public $timestamps = false;

  

    public function topics(){
        return $this->hasMany(Topic::class,'t_course_fk');
    }

    

}
