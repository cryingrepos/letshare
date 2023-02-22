<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs=Faq::orderBy('id','DESC')->get();
        return view('admin.faq.list',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $faqs=Faq::orderBy('id','DESC')->get();
        return view('admin.faq.create',compact('faqs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'question'=>'required',
            'answer'=>'required'
            ])->validate();
            
            try{
                $faq=new Faq();
                $faq->question=$request->question;
                $faq->answer=$request->answer;
                $faq->status='A';
                $faq->is_answered='T';
                $faq->user_id=Auth::user()->id;
                $faq->save();
                return redirect()->route('faq.index')->with('success','Record successfully created');
            }
            catch(Exception $ex){
                dd($ex->getMessage());
            }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq=Faq::findorFail($id);
        return view('admin.faq.edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $faq=Faq::where('id',$id)->first();
            if(!$faq){
                $msg="Record not found";
                throw new Exception($msg);
            }
            $faq->question=$request->question;
            $faq->answer=$request->answer;
            $faq->status=$request->status;
            $faq->save();
            return redirect()->route('faq.index')->with('success','Record successfully updated');
        }catch(Exception $ex){
          dd($ex->getMessage());  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq=Faq::where('id',$id)->delete();
        
        return redirect()->route('faq.index')->with('success','Record successfully deleted');
    }
}
