<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;

class VisitorController extends Controller
{
    function VisitorIndex(){
        $visitorData=json_decode(VisitorModel::orderBy('id','desc')->take(4)->get());


        return view('Visitors',['visitorData'=>$visitorData]);
    }
}
