<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Idea::orderBy('id','desc')->get();
        return view('admin.posts.list', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title'=>'required',
            'content'=>'required',
            'image'=>'required'
        ])->validate();
        try {
            $image_path = $request->image->store('public/posts');
            $image_name = substr($image_path, strlen('public/'));
            $slug = str_replace(" ", "-", $request->title);
            DB::beginTransaction();
            $post = new Idea();
            $post->title = $request->title;
            $post->description = $request->content;
            $post->image = $image_name;
            $post->slug =strtolower($slug);
            $post->user_id =Auth::user()->id;
            $post->save();
            DB::commit();
            return redirect()->route('posts.index')->with('success', 'Posts SuccessFully Created');
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error', $ex->getMessage());
        }
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
        $post_exist = Idea::where('id', $id)->first();
        if($post_exist){
            $post=$post_exist;
            return view('admin.posts.edit', compact('post'));
        }

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
        try {
            DB::beginTransaction();
            $post_exist = Idea::where('id', $id)->first();
            if($post_exist){
                $post_exist->title = $request->title;
                $post_exist->description = $request->description;
                $post_exist->slug = $request->slug;
                if($request->image){
                    $image_path = $request->image->store('public/posts');
                    $image_name = substr($image_path, strlen('public/'));
                    $post_exist->image=$image_name;
                }
                $post_exist->save();
            }
            DB::commit();
            return redirect()->route('posts.index')->with('success', 'Posts SuccessFully Updated');
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_exist = Idea::where('id', $id)->first();
        if($post_exist){
            $post_exist->delete();
            return redirect()->route('posts.index')->with('error', 'Posts Successfully Deleted');
        }
    }
}
