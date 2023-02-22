<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\User;
use App\Models\MemberShip;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function dashboard(){
         $users=User::orderBy('id','DESC')->limit(10)->get();
         $t_users=User::orderBy('id','DESC')->count();
         $posts=DB::table('ideas')->leftJoin('comments','comments.idea_id','=','ideas.id')->select('ideas.*',DB::raw("count(comments.id) as total_comments"))->groupBy('ideas.id')->whereNull('ideas.deleted_at')->get();
         $counts=$posts->count();
         $idea=$posts[0];
         $trending_post=DB::table('ideas')->whereNull('ideas.deleted_at')->join('comments','comments.idea_id','=','ideas.id')->leftJoin('users','users.id','=','ideas.user_id')->select('ideas.*','users.name','comments.*',DB::raw('count(*) as total_comment'))->groupBy('comments.idea_id')->orderby('total_comment','DESC')->get();
         $memberships=MemberShip::orderBy('id','DESC');
         $total_member=$memberships->count();
         $memberships= $memberships->limit(5)->get();
         return view('admin.dashboard',compact('idea','trending_post','memberships','users','counts','total_member','t_users'));
    }
}
