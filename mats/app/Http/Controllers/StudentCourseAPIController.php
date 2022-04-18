<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student_course;

class StudentCourseAPIController extends Controller
{
    public function list(){
        $sc = Student_course::all();
        return  $sc;
    }

    public function get(Request $req){
        $sc = Student_course::where('id',$req->id)->first();
        
        array_merge(
            
            json_decode($sc, true),
            json_decode($sc->student, true),
            json_decode($sc->course, true),
            json_decode($sc->course->topics, true)
           
        );
    
        if($sc){
            return response()->json($sc,200);
        }
        return response()->json(["msg"=>"not found"],404);
        
    }

    public function add(Request $req){
        try{
            $sc = new  Student_course;
            $sc->st_id = $req->st_id;
            $sc->c_id = $req->c_id;
            $sc->tot_topic = $req->tot_topic;
            $sc->complete_topic = $req->complete_topic;
            $sc->sc_status = $req->sc_status;
            if($sc->save()){

                return response()->json(["msg"=>"Added Successfully"],200);
            }
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not add"],500);
        }
  
    }

    public function update(Request $req){
        try{
            $sc = Student_course::where('id',$req->id)->first();
            $sc->st_id = $req->st_id;
            $sc->c_id = $req->c_id;
            $sc->tot_topic = $req->tot_topic;
            $sc->complete_topic = $req->complete_topic;
            $sc->sc_status = $req->sc_status;
            
            if($sc->save()){

                return response()->json(["msg"=>"Updated Successfully"],200);
            }
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not update"],500);
        }

    }

    public function delete(Request $req){
        try{
            $sc = Student_course::where('id',$req->id)->first();
            
            
            if($sc->delete()){

                return response()->json(["msg"=>"Deleted Successfully"],200);
            }
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not delete"],500);
        }

    }
}
