<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseAPIController extends Controller
{
    public function coursesbyins(Request $req){
        try{

                $courses = Course::where('c_instructor_fk',$req->insid)->get();


                if($courses){

                    return response()->json($courses,200);
            }
            return response()->json(["msg"=>"not found"],404);
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Internal Server Error. Maybe request on null value"],500);
        }

   }


   public function getcourse(Request $req){
    try{

                $course = Course::where('id',$req->id)->first();

                    array_merge(
                        json_decode($course->topics, true),
                        json_decode($course, true),
                        json_decode($course->studentsincourse, true)
                    
                    );

                if($course){

                    return response()->json($course,200);
            }
                return response()->json(["msg"=>"not found"],404);
            }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Internal Server Error. Maybe request on null value"],500);
        }
    }

    public function addcourse(Request $req){
        try{
            $course = new  Course();
           
            $course->c_title = $req->c_title;
            $course->c_description = $req->c_description;
            $course->c_price = $req->c_price;
            $course->c_thumbnail =  $req->c_thumbnail;
            $course->c_status = 'Inactive';
            $course->c_instructor_fk = $req->c_instructor_fk;
            $course->c_category_fk = $req->c_category_fk;

            if($course->save()){

                return response()->json(["msg"=>"Topic Added Successfully"],200);
            }
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not add the topic"],500);
        }
  
    
    }


    public function editcourse(Request $req){
        try{
            $course = Course::where('id',$req->id)->first();
            $course->c_title = $req->c_title;
            $course->c_description = $req->c_description;
            $course->c_price = $req->c_price;
            $course->c_thumbnail =  $req->c_thumbnail;
            $course->c_status = 'Inactive';
            $course->c_instructor_fk = $req->c_instructor_fk;
            $course->c_category_fk = $req->c_category_fk;

            
            if($course->save()){

                return response()->json(["msg"=>"Topic updated Successfully"],200);
            }
            return response()->json(["msg"=>"not found"],404);
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not update"],500);
        }

    }

    public function deletecourse(Request $req){
        try{
            $course = Course::where('id',$req->id)->first();
            
            
            if($course->delete()){

                return response()->json(["msg"=>"Deleted Successfully"],200);
            }
            return response()->json(["msg"=>"not found"],404);
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not delete"],500);
        }

    }




}
