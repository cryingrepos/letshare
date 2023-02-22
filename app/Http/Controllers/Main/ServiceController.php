<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoSetting;
use App\CustomFacades\SEO;
class ServiceController extends Controller
{
    public function main(){
         $meta=SeoSetting::where('slug','message')->first();
        SEO::generateMeta($meta);
       // return view('main.service');
       return view('main.background');
    }
}
