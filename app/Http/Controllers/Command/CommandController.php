<?php

namespace App\Http\Controllers\Command;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
class CommandController extends Controller
{
    public function command(Request $request){
        //*****************************************************
             //NEVER PUT MIGRATRE REFRESH IN THIS METHOD:)
        //*****************************************************
     //Artisan::call('make:middleware GlobalMiddleware');
     //Artisan::call('storage:link');
     //Artisan::call('migrate:refresh --path=database/migrations/2023_02_11_073329_create_message_pages_table.php');
     //Artisan::call('make:mail PasswordMail');
       Artisan::call('optimize:clear');
       Artisan::call('route:cache');
       Artisan::call('cache:clear');
       Artisan::call('config:clear');
     
   // Artisan::call('make:controller Auth/Social/SocialAuthController');
    //Artisan::call('make:controller Command/CommandController');
      //Artisan::call('make:model  Page -m');
     // Artisan::call('make:controller Admin/CMS/PagesController');
     // Artisan::call('make:controller Admin/Settings/PaypalController --resource');
      //Artisan::call('make:provider SeoProvider');
    //Artisan::call('make:controller Ideas/MembershipController');
     // Artisan::call('make:model CommentCount -m');
    //Artisan::call('make:migration alter_user_table_image --table=users');
      //Artisan::call('migrate:refresh --path=database/migrations/2023_02_08_075003_create_applets_table.php');
    //database/migrations/2022_12_15_092945_create_payments_table.php;
    //Artisan::call('migrate:refresh --path=database/migrations/2022_12_15_092945_create_payments_table.php');
     // Artisan::call('make:mail PasswordMail');
    // Artisan::call('make:model  MessagePage -m');
     //Artisan::call('make:model  WhowearePage -m');
     //Artisan::call('make:controller Admin/CMS/MessageController');
    // Artisan::call('make:controller Admin/CMS/WhoweareController');
    }
}
