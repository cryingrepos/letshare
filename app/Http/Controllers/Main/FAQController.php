<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoSetting;
use App\CustomFacades\SEO;
use App\Models\Faq;
class FAQController extends Controller
{
    public function main(){
        $meta=SeoSetting::where('slug','faq')->first();
        SEO::generateMeta($meta);
        $faqs=Faq::orderBy('id','DESC')->get();
        return view('main.faq',compact('faqs'));
        //return view('main.background');
    }
}
