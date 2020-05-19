<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;
use App\NewArrivalModel;

class HomeController extends Controller
{


    function HomeIndex(){

        $user_ip=$_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate= date("Y-m-d h:i:sa");
        VisitorModel::insert(['ip_address'=>$user_ip,'visit_time'=>$timeDate]);
       $NewArrivalData=json_decode(NewArrivalModel::orderBy('id','desc')->limit(6)->get());

        return view('Home',[

            'NewArrivalData'=>$NewArrivalData
        ]);

    }

}
