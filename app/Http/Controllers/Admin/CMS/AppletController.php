<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applet;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;
class AppletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applets=Applet::orderBy('id','DESC')->get();
        return view('admin.CMS.applets.list',compact('applets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $applets=Applet::get();
        return view('admin.CMS.applets.create',compact('applets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $request->flash();
          Validator::make($request->all(),[
            'applet_name'=>'required',
            'position'=>'required',
            'type'=>'required'
            ])->validate();
           
            try{
                $applet=Applet::where('applet_name',$request->applet_name)->first();
                if($applet){
                    $msg="Applet Already Created";
                    throw new Exception($msg);
                }
                $app=new Applet();
                $app->applet_name=$request->applet_name;
                $app->applet_slug=$request->applet_slug;
                $app->type=$request->type;
                $app->parent_id=$request->parent_id;
                $app->position=$request->position;
                $app->save();
               return redirect()->route('applets.index')->with('success','Applet Successfully Created');
            }catch(Exception $ex){
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
        $applet=Applet::findOrFail($id);
         $applets=Applet::get();
        return view('admin.CMS.applets.edit',compact('applet','applets'));
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
        $applet=Applet::where('id',$id)->first();
        if(!$applet){
            $msg="Record not found";
           throw new Exception($msg);
        }
        if($request->position>$applet->position){
            //assending
            Applet::where('parent_id','0')->where('position','>',$applet->position)->where('position','<=',$request->position)->update(['position'=>DB::raw('position-1')]);
        }
        if($request->position<$applet->position){
            //desending
            Applet::where('parent_id','0')->where('position','<',$applet->position)->where('position','>=',$request->position)->update(['position'=>DB::raw('position+1')]);
        }
         $applet->position=$request->position;
         $applet->applet_name=$request->applet_name;
         $applet->applet_slug=$request->applet_slug;
         $applet->save();
        return redirect()->route('applets.index')->with('success','Applet successfully updated');
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
        Applet::where('id',$id)->delete();
        return redirect()->route('applets.index')->with('success','Applet successfully deleted');
    }
}
