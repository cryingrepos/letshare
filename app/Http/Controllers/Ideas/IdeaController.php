<?php

namespace App\Http\Controllers\Ideas;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Idea;
use Illuminate\Http\Request;
use App\Models\SeoSetting;
use App\CustomFacades\SEO;
use Illuminate\Support\Facades\Auth;
class IdeaController extends Controller
{
    public function specific(Request $request){
        if(!empty($request->slug)){
             $meta=SeoSetting::where('slug',str_replace('?','',$request->slug))->first();
             SEO::generateMeta($meta);
            $post = Idea::where('slug', $request->slug)->first();
            $comments = Comments::where('idea_id', $post->id)->where('parent_id','0')->get();
            $post->comment_total = $comments->count();
            $post->t_like=$comments->sum('like');
            $post->t_dislike=$comments->sum('dislike');
            $recents=Idea::orderBy('id','DESC')->limit(10)->get();
            return view('ideas.content',compact('post','comments','recents'));
        }
    }
    
    public function createBlog(){
        return view('blog.create');
    }
    
    public function storeBlog(Request $request){
        $request->flash();
        try{
            $idea=new Idea();
            $idea->title=$request->title;
            $idea->slug=strtolower(str_replace(' ','-',$request->title));
            $idea->user_id=Auth::user()->id;
            $image_path=$request->image->store('public/posts');
            $image=substr($image_path,strlen('public/'));
            $idea->image=$image;
            $idea->description=$request->message;
            $idea->save();
            return redirect()->route('avrt.home');
        }catch(Exception $ex){
            dd($ex->getMessage());
           return redirect()->back()->with('success','Your Blog SuccessFully');
        }
    }
        public function editBlog(Request $request){
         $blog=Idea::where('slug',$request->slug)->where('user_id',Auth::user()->id)->first();
         if($blog){
             return view('blog.edit',compact('blog'));
         }
        }
    
    public function updateBlog(Request $request){
        $request->flash();
        try{
            $idea=Idea::where('slug',$request->blog_slug)->where('user_id',Auth::user()->id)->first();
            if($idea){
            $idea->title=$request->title;
            $idea->slug=strtolower(str_replace(' ','-',$request->title));
            $idea->user_id=Auth::user()->id;
            if($request->image){
             $image_path=$request->image->store('public/posts');
              $image=substr($image_path,strlen('public/'));
             $idea->image=$image; 
            }
            $idea->description=$request->message;
            $idea->save();
            return redirect()->route('avrt.home');  
            }else{
                throw new Exception('Blog Mistmatch');
            }
           
        }catch(Exception $ex){
            dd($ex->getMessage());
           return redirect()->back()->with('success','Your Blog SuccessFully');
        }
    }
}
