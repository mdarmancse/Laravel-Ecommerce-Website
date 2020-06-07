<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerModel;

class CheckoutController extends Controller
{
    function CheckoutIndex(){

        return view('Checkout');
    }

    function getData(Request $request){

        $data=CustomerModel::all();

        return view('Checkout',['data'=>$data]);
    }
}
