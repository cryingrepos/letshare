<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoSetting;
use App\CustomFacades\SEO;
use App\Models\MessagePage;
class MessageController extends Controller
{
    public function message(){
        $meta=SeoSetting::where('slug','message')->first();
        SEO::generateMeta($meta);
        $message=MessagePage::first();
        return view('main.message',compact('message'));
        //return view('main.background');
    }
    
}
