<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplicationSetting;
use Illuminate\Support\Facades\Validator;
use Exception;
class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings=ApplicationSetting::orderBy('id','DESC')->get();
        return view('admin.settings.application.list',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.settings.application.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|min:10',
            'address'=>'required',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'postal_code'=>'required',
            'logo'=>'required|image',
            'lat'=>'required|numeric',
            'lng'=>'required|numeric',
            'favicon'=>'required|image|mimes:ico,png',
            'language'=>'required'
            ])->validate();
        try{
            $logo_path=$request->logo->store('public/application');
            $logo=substr($logo_path,strlen('public/'));
            
            $favicon_path=$request->favicon->store('public/application');
            $favicon=substr($favicon_path,strlen('public/'));
            
            $application=new ApplicationSetting();
            $application->name=$request->name;
            $application->email=$request->email;
            $application->phone=$request->phone;
            $application->address=$request->address;
            $application->country=$request->country;
            $application->state=$request->state;
            $application->city=$request->city;
            $application->postal_code=$request->postal_code;
            $application->lat=$request->lat;
            $application->lng=$request->lng;
            $application->logo= $logo;
            $application->language=$request->language;
            $application->favicon=$favicon;
            $application->save();
            return redirect()->route('application.index')->with('success','Application Setting SuccessFully Created');
        }catch(Exception $ex){
            dd($ex->getMessage());
            return redirect()->back()->with('error',$ex->getMessage());
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
        $setting=ApplicationSetting::find($id);
        return view('admin.settings.application.edit',compact('setting'));
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
            $application=ApplicationSetting::find($id);
            $application->name=$request->name;
            $application->email=$request->email;
            $application->phone=$request->phone;
            $application->address=$request->address;
            $application->country=$request->country;
            $application->state=$request->state;
            $application->city=$request->city;
            $application->postal_code=$request->postal_code;
            $application->lat=$request->lat;
            $application->lng=$request->lng;
            $application->language=$request->language;
            if($request->logo){
                $logo_path=$request->logo->store('public/application');
                $logo=substr($logo_path,strlen('public/'));
                  $application->logo= $logo;
            }
            if($request->favicon){
                 $favicon_path=$request->favicon->store('public/application');
                 $favicon=substr($favicon_path,strlen('public/'));
                  $application->favicon=$favicon;
            }
            $application->save();
            return redirect()->route('application.index')->with('success','Application Setting SuccessFully Created');
        }catch(Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
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
       if($id){
           ApplicationSetting::where('id',$id)->delete();
           return redirect()->route('application.index')->with('success','Application Setting Successfully Deleted');
       }
    }
}
