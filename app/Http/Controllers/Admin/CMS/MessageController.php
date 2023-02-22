<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MessagePage;
class MessageController extends Controller
{
    public function createCms(Request $request){
           try{
               $message=MessagePage::first();
            if(empty($message)){
                 $message=new MessagePage();
            }
            $message->banner_title=$request->banner_title;
            $message->banner_subtitle=$request->banner_subtitle;
            if($request->banner_image){
              $banner_image_path=$request->banner_image->store('public/message');
              $banner_image=substr($banner_image_path,strlen('public/'));
             $message->banner_image=$banner_image;
            }
            $message->content_description=$request->content_description;
            $message->rap_title=$request->rap_title;
            $message->rap_content=$request->rap_content;
            $message->listen_title=$request->listen_title;
            $message->listen_content=$request->listen_content;
            if($request->listen_image){
                $listen_image_path=$request->listen_image->store('public/message');
                $listen_image=substr($listen_image_path,strlen('public/'));
                $message->listen_image= $listen_image;
            }
            $message->save();
            return redirect()->back()->with('success','message created succesfully');
           }catch(Exception $ex){
               return redirect()->back()->with('error',$ex->getMessage());
           }
            
    }
}
