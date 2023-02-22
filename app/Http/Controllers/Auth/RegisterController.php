<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function signup(Request $request){
        try {
            $ip =$request->ip();
            $user_exist = User::where('email', $request->email)->first();
            if($user_exist){
                $data = 'User Already Exist With This Email';
                throw new Exception($data);
            }
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->lat = $request->lat;
            $user->lng = $request->lng;
            $user->ip = $ip;
            if($request->image!="undefined"){
                $image=$request->image;
                $image_path=$request->image->store('public/user');
                $image_name=substr($image_path,strlen('public/'));
                $user->image=$image_name;
            }
            $user->save();
            return response()->json([
                'code' => '200',
                'msg' => 'user ceated successfully',
                'data' => $user->email
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'code' => '201',
                'error'=>$ex->getMessage(),
                'msg' => 'Exception Thrown'
            ]);
        }
    }
}
