<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    function CartIndex(){

        return view('Cart');
    }
}
