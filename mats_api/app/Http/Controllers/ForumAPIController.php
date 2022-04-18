<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;

class ForumAPIController extends Controller
{
    public function forums(){
     
            $forum = Forum::all();
           
           
            if($forum){
                foreach ($forum as $f){
                  
                $listforum[]= array_merge(
                    json_decode($f, true),
                    json_decode($f->forumcomments, true),
                     json_decode($f->course, true),
                     json_decode($f->users, true),
                 );
                }
              
                return response()->json($listforum,200);
             }
        return response()->json(["msg"=>"not found"],404);
            
        
        }
    

    public function getforum(Request $req ){
        try{
            $forum = Forum::where('id',$req->id)->first();
        
            if($forum){

                array_merge(
                    json_decode($forum, true),
                    json_decode($forum->forumcomments, true),
                    json_decode($forum->course, true),
                    json_decode($forum->user, true)
                );

                return response()->json($forum,200);
             }
        return response()->json(["msg"=>"not found"],404);
            }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Internal Server Error. Maybe request on null value"],500);
        }
    }


}
