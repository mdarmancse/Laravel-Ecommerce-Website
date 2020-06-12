<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerModel;
use Illuminate\Support\Facades\Session;

class RegistrationController extends Controller
{
    function RegiIndex(){
        return view('Registration');
    }
    function customerRegister(Request $request){

//        $result=CustomerModel::insert([
//            'customer_name'=>$request->input('customer_name'),
//            'email_address'=> $request->input('email_address'),
//            'password'=>$request->input('password'),
//            'mobile'=> $request->input('mobile'),
//
//        ]);

        $customer=new CustomerModel();
        $customer->customer_name = $request->input('customer_name');
        $customer->email_address = $request->input('email_address');
        $customer->password = $request->input('password');
        $customer->mobile = $request->input('mobile');
        $result=$customer->save();

       if($result==true){
           Session::put('id',$customer->customer_id);
           Session::put('name',$customer->customer_name);
           Session::put('email', $customer->email_address);
           Session::put('mobile',  $customer->mobile);
           return redirect('/getData');
       }
       else{

           return redirect()->back()->with("msg","Registration Failed");
       }
    }
}
