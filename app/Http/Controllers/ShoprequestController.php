<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shoprequest;
use Illuminate\Support\Facades\DB;

class ShoprequestController extends Controller
{
    
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request)
        {
            
            $sgshoprequest= DB::table('shoprequest')->where('requestdate','h')->orderBy('requestdate','DESC')->get();
            
            if($request->session()->has('test')){
                $value=$request->session()->forget('test');//for delete session
    
            }
             $data=shoprequest::all();
    
            return view("shoprequest.index",compact('data'));
    
        }
    
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view("shoprequest.create");
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $shoprequest=new shoprequest();
            $shoprequest->requestdate=$request->requestdate;
            $shoprequest->shopid=$request->staffid;
            $shoprequest->permission=$request->permission;
            $shoprequest->staffid=$request->staffid;
           $shoprequest->save();
           $request->session()->flash('message','Successfully create !');
           $request->session()->flash('alert-class','alert-success');
           return redirect('/shoprequestprocess');
    
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
            $shoprequest = shoprequest::find($id);
            return view('shoprequest.edit',compact('shoprequest'));
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
            $imagename=uniqid().".".$request->image->extension();
            $request->image->move(public_path('upload'),$imagename);
            $shoprequest = shoprequest::find($id);
            $shoprequest->requestdate=$request->requestdate;
            $shoprequest->shopid=$request->shopid;
            $shoprequest->permission=$request->permission;
            $shoprequest->staffid=$request->staffid;
           $shoprequest->save();
           $request->session()->flash('message','Successfully Update !');
           $request->session()->flash('alert-class','alert-success');
           return redirect('/shoprequestprocess');
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id,Request $request)
        {
            //echo "delete id is $id";
            $shoprequest=shoprequest::find($id);//get shoprequest record by matching with id
            if(isset($shoprequest)){
                //delete
                $shoprequest->Delete($id);
                $request->session()->flash('Message','Successfully Delete');
                $request->session()->flash('alert-class','alert-success');
    
            }
            else{
                //display error
                $request->session()->flash('Message','No Record Data');
                $request->session()->flash('alert-class','alert-danger');
    
    
            }
            return redirect('/shoprequestprocess');
            // $shoprequest->delete();//delete that shoprequest
            // echo "Successfully delete";
        }
        /**
         * to make search process in index.blade.php
         */
        public function searchProcess(Request $request){
            $data=array();
            //dd();
            if(isset($request->keyword1)&& isset($request->keyword2)){
                
                $data=shoprequest::where('requestdate','LIKE','%'.$request->keyword1.'%')->where('permission','LIKE','%'.$request->keyword2.'%')->get();
            }
            
            return view('shoprequest.index',compact('data'));
    
        }
}

