<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class CustomLoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Perform your custom authentication logic here
        // if ($request->session()->has($password)) {
        //     $value=$request->session()->get($password);
        // }else {
        //         return view("error", ['Message' => "Password is not accept"]);
        // }
        // if($request->session()->has($email)){
        //     $value=$request->session()->get($email);
        // }else{
        //         return view("error", ['Message' => "Email is not accept"]);
        // }
        // if ($email!==null) {
        //     return Err('Invalid Email');
        // }
        // if ($password!==null){
        //     return
        // }
        $error="Invalid";

        if ($email != '' && $password != '') {
            $data = Staff::where('email','=',$request->email)->where('password','=',$request->password)->get();


            if (count($data)>0) {
                return view('shop.index',compact('data'));
            }
            else {
                return view('login',compact('error'));
            }

        }
        else {
            return view("login",compact('error'));

        }
    }
    public function showLoginForm()
    {
        return view('login');
    }


}
