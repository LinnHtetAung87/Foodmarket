<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\staff;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if($request->session()->has('test')){
        //     $value=$request->session()->get('test');
        //     dd($value);
        // }
        if($request->session()->has('test')){
            $value=$request->session()->forget('test');//for delete session

        }


        $data=staff::all();
        //$data=staff::all(1);
        //$data=publisher::(1);


        return view("staff.index",compact('data'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("staff.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staff=new staff();
        $staff->staffname=$request->staffname;
        $staff->address=$request->address;
        $staff->phone=$request->phone;
        $staff->email=$request->email;
        $staff->password=$request->password;
        $staff->roleid=$request->roleid;
       $staff->save();
       $request->session()->flash('message','Successfully create !');
       $request->session()->flash('alert-class','alert-success');
       return redirect('/staffprocess');

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
        $staff = staff::find($id);
        return view('staff.edit',compact('staff'));
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
        // $imagename=uniqid().".".$request->image->extension();
        // $request->image->move(public_path('upload'),$imagename);
        $staff = staff::find($id);
        $staff=new staff();
        $staff->staffname=$request->staffname;
        $staff->address=$request->address;
        $staff->phone=$request->phone;
        $staff->email=$request->email;
        $staff->password=$request->password;
        $staff->roleid=$request->roleid;
       $staff->save();
       $request->session()->flash('message','Successfully Update !');
       $request->session()->flash('alert-class','alert-success');
       return redirect('/staffprocess');
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
        $staff=staff::find($id);//get staff record by matching with id
        if(isset($staff)){
            //delete
            $staff->Delete($id);
            $request->session()->flash('Message','Successfully Delete');
            $request->session()->flash('alert-class','alert-success');

        }
        else{
            //display error
            $request->session()->flash('Message','No Record Data');
            $request->session()->flash('alert-class','alert-danger');


        }
        return redirect('/staffprocess');
        // $staff->delete();//delete that staff
        // echo "Successfully delete";
    }
    /**
     * to make search process in index.blade.php
     */
    function searchProcess(Request $request){
        $data=array();
        //dd();
        if(isset($request->keyword1)&& isset($request->keyword2)){
            //'columnname','sign','value'
            //SELECT * from staffs where publisher = 'kjk'
            $data=staff::where('title','LIKE','%'.$request->keyword1.'%')->where('publisher','LIKE','%'.$request->keyword2.'%')->where('qty','>',10)->get();
        }
        else{


        }
        return view('staff.index',compact('data'));

    }
}
