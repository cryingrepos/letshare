<?php

namespace App\Http\Controllers\Auth\Social;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocialAuthController extends Controller
{
    public function googleRedirect(){
        config('services.google.redirect',route('auth.google.callback'));
        return Socialite::driver('google')->redirect();
    }
    
    public function googleCallback(){
        try{
          $socialuser=Socialite::driver('google')->user();
          $user=User::updateOrCreate(
              ['email'=>$socialuser->email],[
              'name'=>$socialuser->name,
              'password'=>Hash::make($socialuser->id),
              'role'=>'2',
              'is_loggedin'=>'1',
              'email_verified_at'=>date('Y-m-d H:i:s')
              ]);
          Auth::login($user);
        return redirect()->route('avrt.home');
        }catch(Exception $ex){
           dd($ex->getMessage());
        }
      
    }
    
    public function facebookRedirect(){
        return Socialite::driver('facebook')->redirect();
    }
    
    public function facebookCallback(Request $request){
        try{
           $user=Socialite::driver('facebook')->user(); 
             $user_login=User::updateOrCreate(
                 ['email'=>$user->email],[
             'name'=>$user->name,
             'password'=>Hash::make($user->id),
             'role'=>'2',
             'email_verified_at'=>date('d-m-Y H:i:s'),
             'is_loggedin'=>'1'
             ]);
             Auth::login($user_login);
             return redirect()->back();
        }catch(Exception $ex){
             dd($ex->getMessage());
        }
    }
}
