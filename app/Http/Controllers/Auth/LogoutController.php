<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request){
        if(Auth::check()){
            $id = Auth::user()->id;
            User::where('id', $id)->update(['is_loggedin' => '0']);
            $request->session()->invalidate();
            $request->session()->regenerate();
            Auth::logout();
            return redirect()->route('avrt.home');
        }
    }
}
