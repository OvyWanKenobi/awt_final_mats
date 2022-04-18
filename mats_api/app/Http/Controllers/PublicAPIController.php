<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use App\Models\Userlogin;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class PublicAPIController extends Controller
{

    public function sendmail(Request $req){
      try{
        Mail::to($req->insemail)->send(new SendMail("demoS", "demobody"));

      } catch(\Exception $ex){
            return response()->json(["msg"=>$ex],500);
        } 
        return response()->json(["msg"=>"Mail send."],200);
    }



    public function register(Request $req){
 
        try{
        
            if((($req->insname) || ($req->insuname) || ($req->insdegree) || ($req->insbio) || ($req->insphone) || ($req->insemail) || ($req->insexp) || ($req->inspass) || ($req->insconpass) ) == null){
                return response()->json(["msg"=>"Some fields are empty. Fillup properly."],400);
            }
        
            if(($req->inspass) === ($req->insconpass)){


            $add_ins = new Instructor();
            $add_ins->ins_name = $req->insname;
            $add_ins->ins_username = $req->insuname;
            $add_ins->ins_degree = $req->insdegree;
            $add_ins->ins_bio = $req->insbio;
            $add_ins->ins_phone = $req->insphone;
            $add_ins->ins_email = $req->insemail;
            $add_ins->ins_exp = $req->insexp;
            

            $user = new Userlogin();
            $user->u_username = $req->insuname;
            $user->u_type = 'instructor';
            $user->u_password = md5($req->inspass);
            $user->u_access= 'No';
            $user->u_name= $req->insname;
        
            

            if($user->save() && $add_ins->save()){
                
                return response()->json(["msg"=>"Registration Successfully"],200);
            }
            }else{
                return response()->json(["msg"=>"Passwords do not match"],400);
            }
            
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>$ex],500);
        }
    }



    public function login(Request $req){
        try{

            
            $ul=Userlogin::where ('u_username', $req->uname)
            ->where ('u_password', md5($req->pass))
            ->first();
        
            if($ul){
               
                return response()->json(["msg"=>"Login Successful"],200);

            }else{
                return response()->json(["msg"=>"Login Failed! Wrong Credentials"],404);
            }
        
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>$ex],500);
        }
    }


   
}