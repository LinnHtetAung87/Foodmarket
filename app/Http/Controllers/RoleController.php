<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\staff;


use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = role::all();
        return view('role.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Show the form to create a new role
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role=new role();
        $role->name=$request->name;
       $role->save();
       $request->session()->flash('message','Successfully Create !');
       $request->session()->flash('alert-class','alert-success');
       return redirect('/roleprocess');
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
        $role = role::find($id);
        return view('role.edit',compact('role'));
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
        $role = role::find($id);
        $role->name=$request->name;
       $role->save();
       $request->session()->flash('message','Successfully Update !');
       $request->session()->flash('alert-class','alert-success');
       return redirect('/roleprocess');
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
        $role=role::find($id);//get role record by matching with id
        if(isset($role)){
            //delete
            $role->Delete($id);
            $request->session()->flash('Message','Successfully Delete');
            $request->session()->flash('alert-class','alert-success');

        }
        else{
            //display error
            $request->session()->flash('Message','No Record Data');
            $request->session()->flash('alert-class','alert-danger');


        }
        return redirect('/roleprocess');
        // $role->delete();//delete that role
        // echo "Successfully delete";
    }
}
