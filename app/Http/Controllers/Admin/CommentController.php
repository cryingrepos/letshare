<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Idea;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->flash();
        $posts=Idea::get();
        $parents=Comments::with('post')->where('parent_id','0')->orderBY('id','DESC')->get();
        $comments=Comments::with('post')->orderBY('id','DESC');
        if($request->search){
            if($request->post_id){
                $comments=$comments->where('idea_id',$request->post_id);
            }
            if($request->parent_comment_id){
                $comments=$comments->where('parent_id','0')->where('id',$request->parent_comment_id);
            }
            if($request->from_date || $request->to_date){
                $comments=$comments->where(function($query) use($request){
                    $from_date=$request->from_date.' 00:00:00';
                    $to_date=$request->to_date.' 23:59:59';
                    $query->orWhereBetween('created_at',[$from_date,$to_date]);
                    $query->orWhereDate('created_at',$request->from_date);
                    $query->orWhereDate('created_at',$request->to_date);
                });
               
            }
         
        }
        $comments=$comments->get();
        return view('admin.comments.list',compact('comments','posts','parents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id){
            $comment=Comments::where('id',$id)->delete();
            return redirect()->route('comments.index')->with('success','Comment SuccessFully Deleted');
        }
    }
    
    public function deleteAll(Request $request){
        if($request->ids){
          $comment=Comments::whereIn('id',$request->ids)->delete(); 
          
          return redirect()->route('comments.index')->with('success','Bulk Delete Complete');
        }
    }
}
