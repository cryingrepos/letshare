<?php

namespace App\Http\Controllers\Ideas;

use App\Events\StrickOneEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\Comments;
use App\Models\CommentCount;
use App\Models\User;
use App\Models\Idea;
use App\Models\Batter;
use App\Events\CommentArithtmetic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Comment;

class StrikeOneController extends Controller
{
    public function comment(Request $request){
        try {
            $first=false;
            $image="";
            if(!empty($request->data)){
                $user_id = "";
                $post=Idea::with('comments')->where('id', $request->data[2]['value'])->first();
                    if($post->comments->isEmpty()){
                      $first=true;  
                    }
                $user_exist= User::where('email', $request->data[1]['value'])->first();
                if($user_exist){
                    if(Auth::check()){
                        if($user_exist->email!=Auth::user()->email){
                           $data ='Please Subscribe To Arena To Post More Comments';
                           throw new Exception($data); 
                        }
                     }
                     $batter=Batter::where('user_id',$user_exist->id)->first();
                        if($batter){
                          $batter=Batter::where('user_id',$user_exist->id)->where('permission','arena')->first();
                          if(!$batter){
                           $data ='Please Subscribe To Arena To Post More Comments';
                           throw new Exception($data);    
                          }
                    }
                    $user_id=$user_exist->id;
                    $image=$user_exist->image;
                    $batter=new Batter();
                    $batter->user_id=$user_id;
                    $batter->post_id=$request->data[2]['value'];
                    $batter->permission="strike_one";
                    $batter->save();
                 }else{
                      if(Auth::check()){
                        if($request->data[1]['value']!=Auth::user()->email){
                           $data ='Please Subscribe To Arena To Post More Comments';
                           throw new Exception($data); 
                        }
                      }
                    $user = new User();
                    $user->name = $request->data[0]['value'];
                    $user->email = $request->data[1]['value'];
                    $user->password = Hash::make($user->name.'@avrt');
                    $user->role = '2';
                    $user->save();
                    $user_id=$user->id;
                    $batter=new Batter();
                    $batter->user_id=$user_id;
                    $batter->post_id=$request->data[2]['value'];
                    $batter->permission="strike_one";
                    $batter->save();
                 }
                $comment = new Comments();
                $comment->idea_id = $request->data[2]['value'];
                $comment->content = $request->data[3]['value'];
                $comment->user_id = $user_id;
                $comment->save();
                event(new StrickOneEvent($comment));
                $text=strtoupper(substr($comment->user->name,0,2));
                return response()->json([
                    'code' => '200',
                    'msg'=>'Comment Posted SuccessFully',
                    'data'=>$comment,
                    'name'=>$comment->user->name,
                    'first'=>$first,
                    'img_text'=>$text,
                    'date'=>date('d M Y',strtotime($comment->created_at))
                ]);
            }
        } catch (Exception $ex) {
            return response()->json([
                'code' => '201',
                'msg'=>'Comment Posting Failed',
                'error'=>$ex->getMessage()
            ]);
        }
    }
    
    public function commentArithmetic(Request $request){
        if($request->ajax()){
            try{
                if(Auth::check()){
                 $comment_count=CommentCount::where('comment_id',$request->comment_id)->where('user_id',Auth::user()->id)->first();
                if($comment_count){
                   if($request->type=="like"){
                    if($comment_count->like!=0){
                        $msg="Like limit exceeded";
                      throw new Exception($msg);
                    }
                     $comment_count->like=1;
                     $comment_count->dislike=0;
                   }
                 if($request->type=="dislike"){
                    if($comment_count->dislike!=0){
                        $msg="DisLike limit exceeded";
                      throw new Exception($msg);
                    } 
                     $comment_count->dislike=1;
                     $comment_count->like=0;
                  }  
                  $comment_count->save();
                }else{
                     $comment_count=new CommentCount();
                     if($request->type=="like"){
                     $comment_count->like=1; 
                       $comment_count->dislike=0;
                   }
                   if($request->type=="dislike"){
                     $comment_count->dislike=1; 
                      $comment_count->like=0; 
                   }
                   $comment_count->user_id=Auth::user()->id;
                   $comment_count->comment_id=$request->comment_id;
                   $comment_count->save();
                }
                $comment=Comments::where('id',$request->comment_id)->first();
                if($request->type=="like"){
                    $comment->like=$comment->like+1; 
                    if( $comment->dislike!=0){
                      $comment->dislike=$comment->dislike-1;   
                    }
                   
                  
                }
                if($request->type=="dislike"){
                     $comment->dislike=$comment->dislike+1;
                       if( $comment->like!=0){
                            $comment->like=$comment->like-1; 
                       }
                    
                }
                $comment->save();
                event(new CommentArithtmetic($comment,$request->type));
                return response()->json([
                    'code'=>'200',
                    'message'=>'comment updated',
                    'data'=>$comment
                    ]);    
                }
                $msg="Authentication Failed";
                throw new Exception($msg);
            }catch(Exception $ex){
                  return response()->json([
                     'code'=>'201',
                    'message'=>'comment updated failed',
                    'data'=>$ex->getMessage()
                    ]);
            }
        }
    }

}
