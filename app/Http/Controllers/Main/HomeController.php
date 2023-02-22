<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\SeoSetting;
use App\CustomFacades\SEO;
class HomeController extends Controller
{
    public function main(){
        
        $meta=SeoSetting::where('slug','home')->first();
        SEO::generateMeta($meta);
        $posts=Idea::with('comments')->get();
        return view('main.home',compact('posts'));
    }
    
    public function sitemap(){
        return response()->view('sitemap')->header('Content-Type','text/xml');
    }
}
