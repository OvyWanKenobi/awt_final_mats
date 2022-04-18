<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;

class InstructorAPIController extends Controller
{
    public function instructors(){
        $instructors = Instructor::all();
        if($instructors){

            return response()->json($instructors,200);
     }
       return response()->json(["msg"=>"not found"],404);
    }

    public function instructorsbydept(Request $req){    
            try{

                    $instructors = Instructor::where('ins_cat_fk',$req->id)->get();


                    if($instructors){

                        return response()->json($instructors,200);
                }
                return response()->json(["msg"=>"not found"],404);
            }
            catch(\Exception $ex){
                return response()->json(["msg"=>"Internal Server Error. Maybe request on null value"],500);
            }

    }

    

    public function getinstructor(Request $req){
        try{
    
                $instructor = Instructor::where('id',$req->id)->first();

                    array_merge(
                        json_decode($instructor->instructorcategory, true),
                        json_decode($instructor, true),
                        json_decode($instructor->coursesbyinstructor, true)
                    
                    );

                if($instructor){

                    return response()->json($instructor,200);
            }
                return response()->json(["msg"=>"not found"],404);
            }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Internal Server Error. Maybe request on null value"],500);
        }
    }

    public function editinstructor(Request $req){
        try{
            $instructor = Instructor::where('id',$req->id)->first();
            $instructor->ins_name = $req->ins_name;
            $instructor->ins_username = $req->ins_username;
            $instructor->ins_degree = $req->ins_degree;
            $instructor->ins_bio = $req->ins_bio;
            $instructor->ins_cat_fk = $req->ins_cat_fk;
            $instructor->ins_phone = $req->ins_phone;
            $instructor->ins_email = $req->ins_email;
            $instructor->ins_exp = $req->ins_exp;
            $instructor->ins_joindate = $req->ins_joindate;
            $instructor->ins_dp = $req->ins_dp;

            
            if( $instructor->save()){

                return response()->json(["msg"=>"Profile updated Successfully"],200);
            }
            return response()->json(["msg"=>"not found"],404);
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not update"],500);
        }

    }




}
