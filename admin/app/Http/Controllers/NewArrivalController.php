<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewArrivalModel;

class NewArrivalController extends Controller
{
    function ArrivalIndex(){



        return view('NewArrival');

    }

    function getArrivalData(){

        $result=json_decode(NewArrivalModel::orderBy('id','desc')->take(10)->get());
        return $result;

    }

    function deleteArrivalData(Request $request){
        $id=$request->input('id');

       $result= NewArrivalModel::where('id',$id)->delete();

       if($result==true){

           return 1;
       }else{

           return 0;
       }


    }


    function getDetails(Request $req){
        $id= $req->input('id');
        $result=json_encode(NewArrivalModel::where('id','=',$id)->get());
        return $result;
    }

    function updateDetails(Request $request){

        $id=$request->input('id');
        $image=$request->input('image');
        $des=$request->input('description');
        $price=$request->input('price');

        $result=json_encode(NewArrivalModel::where('id',$id)->update([
            'image'=>$image,
            'description'=>$des,
            'price'=>$price

        ]));

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }


    function insertProduct(Request $request){

        $image=$request->input('image');
        $des=$request->input('description');
        $price=$request->input('price');

        $result=json_encode(NewArrivalModel::insert([
            'image'=>$image,
            'description'=>$des,
            'price'=>$price

        ]));

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
