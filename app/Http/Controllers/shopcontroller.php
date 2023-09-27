<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shop;
use Illuminate\Support\Facades\DB;


class shopcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sgshop= DB::table('shops')->where('id','>',0)->orderBy('id','DESC')->first();
        
        if($request->session()->has('test')){
            $value=$request->session()->forget('test');//for delete session

        }

        $data=shop::all();
        return view("shop.index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("shop.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //setting shop logo
        $shoplogo=uniqid().".".$request->file('shoplogo')->extension();//222545655
        //moving shop from temp to actual upload directory
        $request->file('shoplogo')->move(public_path('upload'),$shoplogo);
        $shop=new shop();
        $shop->shopname=$request->shopname;
        $shop->address=$request->address;
        $shop->township=$request->township;
        $shop->memberName=$request->memberName;
        $shop->city=$request->city;
        $shop->email=$request->email;
        $shop->password=$request->password;
        $shop->shoplogo=$shoplogo;
       $shop->save();
       $request->session()->flash('message','Successfully create !');
       $request->session()->flash('alert-class','alert-success');
       return redirect('/shopprocess');
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
        $shop = shop::find($id);
        return view('shop.edit',compact('shop'));
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
        $shop = shop::find($id);
    
      if ($request->hasFile('shoplogo')) {
          $shoplogo = uniqid() . "." . $request->shoplogo->extension();
          $request->shoplogo->move(public_path('upload'), $shoplogo);
        
        // Delete the old image if it exists
        if (file_exists(public_path('upload/' . $shop->shoplogo))) {
            unlink(public_path('upload/' . $shop->shoplogo));
        }
        
        $shop->shoplogo = $shoplogo;
    }

        $shop->shopname = $request->shopname;
        $shop->address = $request->address;
        $shop->township = $request->township;
        $shop->memberName = $request->memberName;
        $shop->city = $request->city;
        $shop->email = $request->email;
        $shop->password = $request->password;

        $shop->save();
        $request->session()->flash('message', 'Successfully Update !');
        $request->session()->flash('alert-class', 'alert-success');
        return redirect('/shopprocess');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop=shop::find($id);//get shop record by matching with id
        if(isset($shop)){
            //delete
            $shop->Delete($id);
            $request->session()->flash('Message','Successfully Delete');
            $request->session()->flash('alert-class','alert-success');

        }
        else{
            //display error
            $request->session()->flash('Message','No Record Data');
            $request->session()->flash('alert-class','alert-danger');


        }
        return redirect('/shopprocess');
    }
    /**
     * to make search process in index.blade.php
     */
    public function searchProcess(Request $request){
        $data=array();
        //dd();
        if(isset($request->keyword1)&& isset($request->keyword2)){
            //'columnname','sign','value'
            //SELECT * from shops where publisher = 'kjk'
            $data=shop::where('shopname','LIKE','%'.$request->keyword1.'%')->where('memberName','LIKE','%'.$request->keyword2.'%')->get();
        }
        else{


        }
        return view('shop.index',compact('data'));

    }
}
