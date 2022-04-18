<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicAPIController extends Controller
{
    public function gettopic(Request $req){
        try{

                $topic = Topic::where('id',$req->id)->first();

                array_merge(
                    json_decode($topic->topicofcourse, true),
                    json_decode($topic, true),
                    json_decode($topic->quizintopic, true)
                );

            if($topic){

                return response()->json($topic,200);
             }
            return response()->json(["msg"=>"not found"],404);
          }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Internal Server Error. Maybe request on null value"],500);
        }
    }



    public function addtopic(Request $req){
        try{
            $topic = new  Topic;
            $topic->t_number = $req->t_number;
            $topic->t_title = $req->t_title;
            $topic->t_video = $req->t_video;
            $topic->t_material = $req->t_material;
            $topic->t_course_fk = $req->t_course_fk;
            $topic->t_publicviewlock = $req->t_publicviewlock;

            if($topic->save()){

                return response()->json(["msg"=>"Topic Added Successfully"],200);
            }
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not add the topic"],500);
        }
  
    }

    public function edittopic(Request $req){
        try{
            $topic = Topic::where('id',$req->id)->first();
            $topic->t_number = $req->t_number;
            $topic->t_title = $req->t_title;
            $topic->t_video = $req->t_video;
            $topic->t_material = $req->t_material;
            $topic->t_course_fk = $req->t_course_fk;
            $topic->t_publicviewlock = $req->t_publicviewlock;

            
            if($topic->save()){

                return response()->json(["msg"=>"Topic updated Successfully"],200);
            }
            return response()->json(["msg"=>"not found"],404);
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not update"],500);
        }

    }

    public function deletetopic(Request $req){
        try{
            $topic = Topic::where('id',$req->id)->first();
            
            
            if($topic->delete()){

                return response()->json(["msg"=>"Deleted Successfully"],200);
            }
            return response()->json(["msg"=>"not found"],404);
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not delete"],500);
        }

    }


    



}
