<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;
use App\NewArrivalModel;
use App\OfferModel;
use App\TestimonialModel;

class HomeController extends Controller
{


    function HomeIndex(Request $request){

        $user_ip=$_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate= date("Y-m-d h:i:sa");
        VisitorModel::insert(['ip_address'=>$user_ip,'visit_time'=>$timeDate]);

       $NewArrivalData=json_decode(NewArrivalModel::orderBy('id','desc')->limit(6)->get());
        $OfferModelData=json_decode(OfferModel::orderBy('id','desc')->limit(1)->get());
        $TestimonialData=json_decode(TestimonialModel::orderBy('id','desc')->get());


        return view('Home',[

            'NewArrivalData'=>$NewArrivalData,
            'OfferModelData'=>$OfferModelData,
            'TestimonialData'=>$TestimonialData
        ]);

    }

}
