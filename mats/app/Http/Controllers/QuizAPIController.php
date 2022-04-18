<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizAPIController extends Controller
{
    public function list(){
        $quizzes = Quiz::all();
        return  $quizzes;
    }

    public function get(Request $req){
        $quiz = Quiz::where('id',$req->id)->first();

        array_merge(
           
            json_decode($quiz, true),
            json_decode($quiz->quizoftopic, true),
            json_decode($quiz->quizoftopic->topicofcourse, true),
        );

        if($quiz){
            return response()->json($quiz,200);
        }
        return response()->json(["msg"=>"not found"],404);
        
    }

    public function add(Request $req){
        try{
            $quiz = new  Quiz;
            $quiz->q_quesnumber = $req->q_quesnumber;
            $quiz->q_ques = $req->q_ques;
            $quiz->q_option1 = $req->q_option1;
            $quiz->q_option2 = $req->q_option2;
            $quiz->q_option3 = $req->q_option3;
            $quiz->q_option4 = $req->q_option4;
            $quiz->q_ans = $req->q_ans;
            $quiz->q_topic_fk = $req->q_topic_fk;
 

            if($quiz->save()){

                return response()->json(["msg"=>"Added Successfully"],200);
            }
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not add"],500);
        }
  
    }

    public function update(Request $req){
        try{
            $quiz = Quiz::where('id',$req->id)->first();
            $quiz->q_quesnumber = $req->q_quesnumber;
            $quiz->q_ques = $req->q_ques;
            $quiz->q_option1 = $req->q_option1;
            $quiz->q_option2 = $req->q_option2;
            $quiz->q_option3 = $req->q_option3;
            $quiz->q_option4 = $req->q_option4;
            $quiz->q_ans = $req->q_ans;
            $quiz->q_topic_fk = $req->q_topic_fk;
            
            if($quiz->save()){

                return response()->json(["msg"=>"Updated Successfully"],200);
            }
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not update"],500);
        }

    }

    public function delete(Request $req){
        try{
            $quiz = Quiz::where('id',$req->id)->first();
            
            
            if($quiz->delete()){

                return response()->json(["msg"=>"Deleted Successfully"],200);
            }
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not delete"],500);
        }

    }
}
