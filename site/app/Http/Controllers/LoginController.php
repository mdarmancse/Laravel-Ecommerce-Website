<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerModel;

class LoginController extends Controller
{
    function LoginIndex(){

        return view('Login');
    }

    function onLogin(Request $request){

        $email=$request->input('email_address');
        $password= $request->input('password');

        $countValue=CustomerModel::where('email_address','=',$email)->where('password','=',$password)->count();


        if($countValue==1){
                $request->session()->put('email_address',$email);
                return redirect('/');

        }else{
               return redirect()->back();
        }
    }
}
