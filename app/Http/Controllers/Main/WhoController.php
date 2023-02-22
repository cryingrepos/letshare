<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoSetting;
use App\CustomFacades\SEO;
class WhoController extends Controller
{
    public function main(){
         $meta=SeoSetting::where('slug','wwa')->first();
          SEO::generateMeta($meta);
         return view('main.who-are-we');
        // return view('main.background');
    }
}
