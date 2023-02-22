<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mailer;
use Illuminate\Support\Facades\Validator;

class MailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mailers=Mailer::orderBy('id','DESC')->get();
        return view('admin.settings.mailer.list',compact('mailers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.mailer.create');
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
            'transport'=>'required',
            'host'=>'required',
            'port'=>'required|numeric',
            'encryption'=>'required',
            'username'=>'required',
            'password'=>'required',
            'timeout'=>'required',
            ])->validate();
            dd($request->all());
        try{
            $mailer=new Mailer();
            $mailer->transport=$request->transport;
            $mailer->host=$request->host;
            $mailer->port=$request->port;
            $mailer->encryption=$request->encryption;
            $mailer->username=$request->username;
            $mailer->password=$request->password;
            $mailer->timeout=$request->timeout;
            $mailer->from_address=$request->from_address;
            $mailer->from_name=$request->from_name;
            $mailer->save();
            return redirect()->route('mailer.index')->with('success','Mailer Setting SuccessFully Saved');
        }catch(Exception $ex){
            return redirect()-back()->with('Dberror',$ex->getMessage());
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
      $mailer=Mailer::where('id',$id)->first();
      return view('admin.settings.mailer.edit',compact('mailer'));
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
            $mailer=Mailer::where('id',$id)->first();
            $mailer->transport=$request->transport;
            $mailer->host=$request->host;
            $mailer->port=$request->port;
            $mailer->encryption=$request->encryption;
            $mailer->username=$request->username;
            $mailer->password=$request->password;
            $mailer->timeout=$request->timeout;
            $mailer->from_address=$request->from_address;
            $mailer->from_name=$request->from_name;
            $mailer->save();
            return redirect()->route('mailer.index')->with('success','Mailer Setting SuccessFully Saved');
        }catch(Exception $ex){
            return redirect()-back()->with('Dberror',$ex->getMessage());
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
            Mailer::where('id',$id)->delete();
            return redirect()->route('mailer.index')->with('success','Mailer SuccessFully Deleted');
            
        }
    }
}
