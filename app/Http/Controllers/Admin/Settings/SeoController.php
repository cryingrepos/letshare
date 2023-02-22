<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoSetting;
use App\Models\Idea;
use Illuminate\Support\Facades\Validator;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metas=SeoSetting::orderBy('id','DESC')->get();
        return view('admin.settings.seo.list',compact('metas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ideas=Idea::get();
        return view('admin.settings.seo.create',compact('ideas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Validator::make($request->all(),[
            'title'=>'required|unique:seo_settings,title',
            'description'=>'required',
            'keywords'=>'required',
            'slug'=>'required',
            'url'=>'required'
            ])->validate();
           
        try{
            $meta=new SeoSetting();
            $meta->title=$request->title;
            $meta->description=$request->description;
            $meta->keywords=$request->keywords;
            $meta->slug=$request->slug;
            $meta->url=$request->url;
            $meta->robots=$request->robots;
            $meta->googlebot=$request->googlebot;
            $meta->bingbot=$request->bingbot;
            if($request->image){
                $image_path=$request->image->store('public/seo');
                $image_name=substr($image_path,strlen('public/'));
                $meta->image=$image_name;
            }
            $meta->save();
            return redirect()->route('seo.index')->with('Success','Seo Setting SuccessFully Created');
        }catch(Exception $ex){
            dd($ex->getMessage());
            return redirect()->back()->with('DBerror',$ex->getMessage());
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
        $meta=SeoSetting::where('id',$id)->first();
        $ideas=Idea::get();
        if($meta){
            return view('admin.settings.seo.edit',compact('meta','ideas'));
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
         try{
            $meta=SeoSetting::where('id',$id)->first();
            $meta->title=$request->title;
            $meta->description=$request->description;
            $meta->keywords=$request->keywords;
            $meta->url=$request->url;
            $meta->robots=$request->robots;
            $meta->googlebot=$request->googlebot;
            $meta->bingbot=$request->bingbot;
             if($request->image){
                $image_path=$request->image->store('public/seo');
                $image_name=substr($image_path,strlen('public/'));
                $meta->image=$image_name;
            }
            $meta->save();
            return redirect()->route('seo.index')->with('Success','Seo Setting SuccessFully Created');
        }catch(Exception $ex){
            return redirect()->back()->with('DBerror',$ex->getMessage());
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
        if($id){
            SeoSetting::where('id',$id)->delete();
            return redirect()->route('seo.index')->with('success','SeoSuccessFully Deleted');
        }
    }
}
