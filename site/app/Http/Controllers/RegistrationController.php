<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerModel;

class RegistrationController extends Controller
{
    function RegiIndex(){

        return view('Registration');
    }

    function insertData(Request $request){


        $first_name= $request->input('first_name');
        $last_name=$request->input('last_name');
        $email_address= $request->input('email_address');
        $shipping_email= $request->input('shipping_email');
        $password= $request->input('password');
        $telephone= $request->input('telephone');


        $result=CustomerModel::insert([

            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'email_address'=>$email_address,
            'shipping_email'=>$shipping_email,
            'password'=>$password,
            'telephone'=>$telephone,

        ]);
       if($result==true){

           return ("Registration Success");                }
       else{

         return ("Registration Failed");
       }
    }
}
