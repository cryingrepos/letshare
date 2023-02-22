<?php

namespace App\Http\Controllers\Ideas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\MemberShip;
use App\Models\Idea;
use App\Models\Batter;
use App\Models\Payments;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal;
use Srmklive\PayPal\Services\ExpressCheckout;
use Stripe\Customer;
use Stripe\Stripe;
use Stripe\StripeClient;
use Stripe\Exception\CardException;
class MembershipController extends Controller
{
    public function subscribe(Request $request){
        if($request->ajax()){
            $type="";
            $url="";
                  try{
                       if(!Auth::check()){
                          $data="Please Login To Continue";
                          $type="auth";
                          throw new Exception($data);
                       }
                       $post=Idea::where('slug',$request->slug)->first();
                       if(!$post){
                           $data="Post Not Found!Server Error";
                           $type="post";
                           throw new Exception($data);
                       }
                       if($request->type=="weekly"){
                           $amount=150;
                       }
                         if($request->type=="monthly"){
                           $amount=500;
                       }
                         if($request->type=="yearly"){
                           $amount=5000;
                       }
                $membership=new MemberShip();
                $membership->user_id=Auth::user()->id;
                $membership->post_id=$post->id;
                $membership->type=$request->type;
                $membership->payment_method=$request->pay_method;
                $membership->payment_amount=$amount;
                $membership->email=$request->email;
                $membership->name=$request->email;
                $membership->save();
                $response=$this->membershipPayment($membership,$request);
                if($response['method']=='paypal'){
                    $url=$response['url'];
                }
                
                 return response()->json([
                    'code'=>'200',
                    'message'=>'Membership Succfully',
                     'data'=>$membership,
                     "response"=> $response,
                     "url"=>$url,
                    ]);
            }catch(Exception $ex){
                return response()->json([
                    'code'=>'201',
                    'message'=>'Membership Failed',
                    'error'=>$ex->getMessage(),
                    'type'=>$type
                    ]);
            }

        }

    }

    public function membershipPayment($membership,$request){
        if($membership){
            $response="";
            if($membership->payment_method=='paypal'){
                $response=$this->paypalInit($membership);
            }
             if($membership->payment_method=='stripe'){
                $response=$this->stripeInit($membership,$request);
            }
             if($membership->payment_method=='payumoney'){
                
            }
           
            
            return $response;
        }
    }
    
    public function paypalInit($membership){
         $request=[];
         $response=[];
         $url="";
        $request['intent']='CAPTURE';
        $request['purchase_units']=[];
        $request['purchase_units']['items']=[
                [
              "name"=>$membership->type.'membership',
              "description"=>$membership->type.'Membership Membership For AVRT Arean',
              "quantity"=>"1",
              "unit_amount"=>[
                  "currency_code"=>"USD",
                  "value"=>(string)$membership->payment_amount
                  ]
                ]
            ];
      $request['purchase_units']['amount']=[
          "currency_code"=> "USD",
                "value"=> (string)$membership->payment_amount,
                "breakdown"=> [
                    "item_total"=> [
                        "currency_code"=> "USD",
                        "value"=> (string)$membership->payment_amount
                    ]
                ]
            ];
            $request['purchase_units']=[$request['purchase_units']];
       $request["application_context"]=[
         "return_url"=>route('payment.paypal.success',['slug'=>$membership->post->slug]) ,
        "cancel_url"=>route('payment.paypal.cancel',['slug'=>$membership->post->slug])
        ]; 
        $paypal= new Paypal();
        $token_response=$paypal->getAccessToken();
        $paypal_provider=$paypal->setAccessToken($token_response);
        $paypal->setCurrency('USD');
        $response_order=$paypal->createOrder($request);
        $payment_res=$this->savePaymentDetails('paypal',$membership->id,$response_order['id'],$response_order['status']);
        if($payment_res['status']==false){
              $response['method']='paypal';
              $response['url']=$url;
              $response['error']=$payment_res['error'];
        }
        foreach($response_order['links'] as $link){
            if($link['rel']=="approve"){
                $url=$link['href'];
            }
        }
        $response['method']='paypal';
        $response['url']=$url;
        $response['error']=null;
        return $response;
    }
    
    public function paypalSuccess(Request $request){
        $post=Idea::where('slug',$request->slug)->first();
        $user_id="";
        if(Auth::check()){
            $user_id=Auth::user()->id ;
        }
        $paypal= new Paypal();
        $paypal->getAccessToken();
        $response=$paypal->capturePaymentOrder($request->token);
        if(isset($response['status']) && $response['status'] == 'COMPLETED'){
              $batter=Batter::where('post_id',$post->id)->where('user_id',$user_id)->first();
              if($batter){
               $batter->permission='arena';
               $batter->save();
               return redirect()->route('arena.post',['slug'=>$request->slug])->with('success','You Are SuccessFully Subscribed For AVRT Arena');
              }else{
                  $batter=new Batter();
                  $batter->user_id=$user_id;
                  $batter->post_id=$post->id;
                  $batter->permission='arena';
                  $batter->save();
             return redirect()->route('arena.post',['slug'=>$request->slug])->with('success','You Are SuccessFully Subscribed For AVRT Arena');
              }
             return redirect()->route('arena.post',['slug'=>$request->slug])->with('success','You Are SuccessFully Subscribed For AVRT Arena');
        }else{
           return redirect()->route('arean.checkout',['slug'=>$request->slug])->with('cancel','Your Payment Is SuccessFully Cancelled!Can You Tell Us The Reason?'); 
        }
        
    }
    
    public function savePaymentDetails($method,$m_id,$order_id,$order_status,$url=null){
        try{
        $response=[];
        $payment=new Payments();
        $payment->membership_id=$m_id;
        $payment->payment_method=$method;
        $payment->order_id=$order_id;
        $payment->order_status=$order_status;
        $payment->payment_status='inprogress';
        $payment->stripe_url=$url;
        $cred=['order_id'=>$order_id,'membership_id'=>$m_id];
        $payment->payment_cred=$cred;
        $payment->save();
        $response['status']=true;
        return  $response;
        }catch(Exception $ex){
             $response['status']=false;
             $response['error']=$ex->getMessage();
            return $ex->getMessage();
        }
    }
    
    public function paypalCancel(Request $request){
        return redirect()->route('arean.checkout',['slug'=>$request->slug])->with('cancel','Your Payment Is SuccessFully Cancelled!Can You Tell Us The Reason?');
    }
    
    public function stripeInit($membership,$request){
         $response=[];
        try{
            $client=new StripeClient(env('STRIPE_SECRET'));
            $token=$client->tokens->create([
                'card'=>[
                    'number'=>$request->stripe_number,
                    'exp_month'=>$request->stripe_month,
                    'exp_year'=>$request->stripe_year,
                    'cvc'=>$request->stripe_cvv,
                    ]
                ]);
                
             $charge=$client->charges->create([
              'amount'=>$membership->payment_amount,
              'currency'=>'usd',
              'source'=>$token['id'],
              'description'=>'This is Arena Membership Charges.'
              ]);
              if($charge['status']=="succeeded"){
                  $res=$this->savePaymentDetails('stripe',$membership->id,$charge['id'],$charge['status'],$charge['receipt_url']);
                  if($res['status']==true){
                   $response['method']='stripe';
                   $response['status']=$charge['status'];
                   $response['url']=$charge['receipt_url'];
                   $response['charge']=$charge;  
                     return    $response;
                  }
                  if($res['status']==false){
                      $msg=$response['error'];
                      throw new Exception($msg);
                  }
              }
           
          
            
        }catch(CardException $ex){
             $response['method']='stripe';
             $response['status']='failed';
             $response['request']=$request->all();
            $response['error']=$ex->getMessage();
            return  $response; 
        }
        catch(Exception $ex){
              $response['method']='stripe';
              $response['status']='failed';
              $response['request']=$request->all();
              $response['error']=$ex->getMessage();
            return  $response;
        }
    }
}
