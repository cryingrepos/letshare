<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoSetting;
use App\CustomFacades\SEO;

class BackgroundController extends Controller
{
    public function main(){
        $meta=SeoSetting::where('slug','back')->first();
        SEO::generateMeta($meta);
        return view('main.background');
    }
}
