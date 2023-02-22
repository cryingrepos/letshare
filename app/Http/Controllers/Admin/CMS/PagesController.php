<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhowearePage;
use App\Models\MessagePage;

class PagesController extends Controller
{
    public function home(){
        
    }
    
    public function faq(){
        
    }
    
    public function back(){
        
    }
    
    public function message(){
        $message=MessagePage::first();
        if(empty($message)){
            $message=[];
        }
        return view('admin.CMS.pages.message',compact('message'));
    }
    
    public function whoarewe(){
          $who=WhowearePage::first();
         if(empty($who)){
              $who=[];
         }
         return view('admin.CMS.pages.who_are_we',compact('who'));
    }
    
    public function contact(){
        
    }
}
