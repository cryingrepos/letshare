<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoSetting;
use App\CustomFacades\SEO;
use App\Models\Contact;
use App\Models\User;
use App\Mail\ContactMail;
use Mail;
class ContactController extends Controller
{
    public function main(){
        $recents=[];
      $meta=SeoSetting::where('slug','contact')->first();
        SEO::generateMeta($meta);
        return view('main.contact');
    }
    
    public function storeContact(Request $request){
        try{
           
            $contact=new Contact();
            $contact->name=$request->name;
            $contact->email=$request->email;
            $contact->subject=$request->subject;
            $contact->message=$request->message;
            if($request->email){
                $user=User::where('email',$request->email)->first();
                if($user){
                      $contact->user_id=$user->id;
                }
            }
           $contact->save();
           $mail=$this->sendMail($contact);
           return redirect()->back()->with('success','Your message successfully sent');
            
        }catch(Exception $ex){
            dd($ex->getMessage());
        }
    }
    
    public function sendMail($contact){
        if($contact){
            Mail::to('avrt@avrt.com')->send(new ContactMail($contact) );
        }
    }
}
