<?php
namespace App\ServiceContainer;

class MetaGenerator{
    public $compliedmeta="";
    public function generateMeta($metadata){
        if($metadata){
            $metas=[];
            $metas[]="<meta name=\"robots\" content=\"{$metadata->robots}\"/>";
            $metas[]="<meta name=\"googlebot\" content=\"{$metadata->googlebot}\"/>";
            $metas[]="<meta name=\"bingbot\" content=\"{$metadata->bingbot}\"/>";
            $metas[]="<meta name=\"title\" content=\"{$metadata->title}\"/>";
            $metas[]="<meta name=\"description\" content=\"{$metadata->description}\"/>";
            $metas[]="<meta name=\"keywords\" content=\"{$metadata->keywords}\"/>";
            $metas[]="<meta name=\"identifier-URL\" content=\"{$metadata->url}\"/>";
            $metas[]="<meta name=\"subject\" content=\"Active Voice RecogNization Technique\"/>";
            $metas[]="<meta name=\"author\" content=\"AVRT\"/>";
            $metas[]="<meta name=\"copyright\" content=\"AVRT\"/>";
            $metas[]="<meta name=\"distribution\" content=\"global\"/>";
            $metas[]="<meta name=\"language\" content=\"en-us\"/>";
            $metas[]="<meta property=\"og:locale\" content=\"en-us\"/>";
            $metas[]="<meta property=\"og:type\" content=\"website\"/>";
            $metas[]="<meta property=\"og:site_name\" content=\"AVRT\"/>";
            $metas[]="<meta property=\"og:title\" content=\"{$metadata->title}\"/>";
            $metas[]="<meta property=\"og:description\" content=\"{$metadata->description}\"/>";
            $metas[]="<meta property=\"og:url\" content=\"{$metadata->url}\"/>";
            $metas[]="<meta property=\"og:image\" content=\"{$metadata->image}\"/>";
            $metas[]="<meta property=\"og:image:type\" content=\"{$metadata->img_type}\"/>";
            $metas[]="<meta property=\"og:image:alt\" content=\"AVRT\"/>";
            $metas[]="<meta name=\"twitter:card\" content=\"summery\"/>";
            $metas[]="<meta name=\"twitter:description\" content=\"{$metadata->description}\"/>";
            $metas[]="<meta name=\"twitter:title\" content=\"{$metadata->title}\"/>";
            $metas[]="<meta name=\"twitter:image\" content=\"{$metadata->image}\"/>";
            $metas[]="<meta name=\"twitter:site\" content=\"AVRT\"/>";
            $this->compliedmeta=implode(" ",$metas);
        }
    }
    public function metaTags(){
        return $this->compliedmeta;
    }
}









?>
