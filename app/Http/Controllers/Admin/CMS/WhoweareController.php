<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhowearePage;

class WhoweareController extends Controller
{
    public function createCms(Request $request){
        try{
            $request->flash();
            $who=new WhowearePage();
            if(isset($request->who_id)){
               $who=WhowearePage::where('id',$request->who_id)->first();  
            }
            $who->banner_text=$request->banner_text; 
            if($request->banner_image){
             $b_image_path=$request->banner_image->store('public/who');
            $banner_image=substr($b_image_path,strlen('public/'));
            $who->banner_image=$banner_image;  
            }
           
            $who->content_heading=$request->content_heading;
            $who->content_description=$request->content_description;
            if($request->content_image){
              $c_image_path=$request->content_image->store('public/who');
            $content_image=substr($c_image_path,strlen('public/'));
            $who->content_image=$content_image;  
            }
            
            $who->content_background=$request->content_background;
            $who->section_heading=$request->section_heading;
            $who->section_sub_heading=$request->section_sub_heading;
            if($request->section_image){
             $s_image_path=$request->section_image->store('public/who');
            $background_image=substr($s_image_path,strlen('public/'));
            $who->section_image=$background_image;    
            }
            $who->section_button_text=$request->section_button_text;
            $who->section_button_color=$request->section_button_color;
            $who->save();
            return redirect()->back()->with('successs','cms created');
        }catch(Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
}
