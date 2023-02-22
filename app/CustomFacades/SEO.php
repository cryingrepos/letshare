<?php
  namespace App\CustomFacades;
  use Illuminate\Support\Facades\Facade;
  
  class SEO extends Facade{
      
     protected static function getFacadeAccessor(){
         return 'seogenerator';
     }
  }



?>