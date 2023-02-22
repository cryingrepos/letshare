<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Mail\PasswordMail;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
class LoginController extends Controller
{
    public function signin(Request $request){
        try {
            $user = User::where('email', $request->data['email'])->first();
            $type = "";
            if(empty($user)){
                $type= 'email';
                $data = 'Email Does Not Exist In Our Record!Please Register';
                throw new Exception($data);
            }
            if($user){
                    $password=$user->name.'@avrt';
                    if(Hash::check($password,$user->password)){
                     $user->password = Hash::make($request->data['password']);
                    $user->save();   
                    }
            }
            if(!Hash::check($request->data['password'],$user->password)){
                $type= 'password';
                $data= 'Password Does Not Match!Check and ReEnter!';
                throw new Exception($data);
            }
            $user->ip = $request->ip();
            $user->lat = $request->data['lat'];
            $user->lng = $request->data['lng'];
            $user->is_loggedin = '1';
            $user->save();
             Auth::login($user,true);
             
             if(Auth::check()){
                return response()->json([
                    'code' => '200',
                    'msg' => 'Login SuccessFull',
                    'data' => Auth::user()->name,
                    'role'=>Auth::user()->role
                ]);
             }
        } catch (Exception $ex) {
            return response()->json([
                'code' => '201',
                'msg' => 'Exception Error',
                'type'=>$type,
                'error' => $ex->getMessage()
            ]);
        }
    }
    
    public function passwordLink(Request $request){
        if($request->ajax()){
            try{
               if($request->email){
                $user_exist=User::where('email',$request->email)->first();
                if(!$user_exist){
                   $msg='Email does not exist with our record!';
                  throw new Exception($msg);
                }
                $mail=Mail::to($user_exist->email)->send(new PasswordMail($user_exist));
                   return response()->json([
                       "code"=>"200",
                       "message"=>"Please check your email, and follow further procedure!",
                       "data"=>$user_exist->email,
                       ]);
            }
            }catch(Exception $ex){
                         return response()->json([
                       "code"=>"201",
                       "message"=>$ex->getMessage(),
                       "data"=>null
                       ]);
            }catch(TransportExceptionInterface $mail){
                   return response()->json([
                       "code"=>"201",
                       "message"=>$mail->getMessage(),
                       "data"=>null
                       ]);
            }
          
        }
    }
    
    public function resetPassword($email){
          $user_exist=User::where('email',$email)->first();
          if($user_exist){
              return view('auth.passwordreset',['email'=>$user_exist->email]); 
          }
    }
    
    public function changePassword(Request $request){
        $user_exist=User::where('email',$request->email)->first();
        if($user_exist){
            $user_exist->password=Hash::make($request->password);
            $user_exist->save();
            return redirect()->back()->with('Success','User Password SuccessFully Changed');
        }
        
    }
}
