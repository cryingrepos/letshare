<?php

namespace App\Http\Controllers\Ideas;

use App\Events\StrickOneEvent;
use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;
use Exception;
use App\Models\Comments;
use App\Models\User;
use App\Models\Batter;
use App\Events\ArenaEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Comment;

class ArenaController extends Controller
{
    
    public function comment(Request $request){
        DB::beginTransaction();
           try {
               if(Auth::check()){
                   $comment = new Comments();
                   $comment->user_id =Auth::user()->id;
                   $comment->idea_id =$request->post_id;
                   $comment->content =$request->comment;
                   $comment->save();
               }
               DB::commit();
               event(new ArenaEvent($comment,'comment'));
               return response()->json([
                   'code' =>'200',
                   'msg' => 'Commnet SuccessFully Saved',
                   'data'=>$comment,
                   'date' => date('d M Y H:i',strtotime($comment->created_at)),
                   'url'=>'https://avrt.com/arena/delete/?reply='.$comment->id,
                   'name'=>$comment->user->name,
                   'img_text'=>strtoupper(substr($comment->user->name,0,2))
               ]);
           } catch (Exception $ex) {
               DB::rollBack();
               return response()->json([
                   'code' => '500',
                   'msg' => 'Comment Failed',
                   'error' => $ex->getMessage()
               ]);
           }
    }
    public function reply(Request $request){
        if(!empty($request->data)){
           DB::beginTransaction();
           try {
               if(Auth::check()){
                   $comment_exist=Comments::where('id',$request->data[0]['value'])->first();
                   if($comment_exist){
                       $user_id=Auth::user()->id;
                       $parent_id=$comment_exist->id;
                       $post_id=$comment_exist->idea_id;
                   }
                   $comment = new Comments();
                   $comment->parent_id =$parent_id;
                   $comment->user_id =$user_id;
                   $comment->idea_id =$post_id;
                   $comment->content =$request->data[1]['value'];
                   $comment->save();
               }
               DB::commit();
             event(new ArenaEvent($comment,'reply'));
               return response()->json([
                   'code' => 200,
                   'msg' => 'Relpy SuccessFully Saved',
                   'data'=>$comment,
                   'date' => date('d M Y H:i',strtotime($comment->created_at)),
                   'url'=>'https://avrt.com/arena/delete/?reply='.$comment->id,
                   'name'=>$comment->user->name,
                   'img_text'=>strtoupper(substr($comment->user->name,0,2))
               ]);
           } catch (Exception $ex) {
               DB::rollBack();
               return response()->json([
                   'code' => 201,
                   'msg' => 'Reply Failed',
                   'error' => $ex->getMessage()
               ]);
           }
        }
   }

   public function checkout(Request $request){
    if(Auth::check()){
         $post=Idea::where('slug',$request->slug)->first();
           if($post){
               $batter=Batter::where('user_id',Auth::user()->id)->where('permission','arena')->first();
               if($batter){
                   return redirect()->route('arena.post', ['slug' => $request->slug]);   
               }else{
                   return view('ideas.checkout');
               }
           }
    }

   }

   public function arena(Request $request){
       $post=Idea::where('slug',$request->slug)->first();
       $comments=Comments::with('reply')->where('idea_id',$post->id)->where('parent_id','0')->get();
       $total_comment=$comments->count();
       $total_like=$comments->sum('like');
       $total_dislike=$comments->sum('dislike');
       $recents=Idea::orderBy('id','desc')->limit(10)->get();
       return view('ideas.arena',compact('post','comments','recents','total_like','total_dislike','total_comment'));
   }

   public function delete(Request $request){
       if($request->reply){
            $deleted = Comments::where('id', $request->reply)->orWhere('parent_id', $request->reply)->delete();
            return redirect()->back()->with('delete', 'Comments Deleted Successfully');
       }
   }
}
