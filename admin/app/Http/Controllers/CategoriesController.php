<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatagoriesModel;

class CategoriesController extends Controller
{
    function CategoriesIndex(){

        return view('Categories');

    }

    function getCategoryData(){

        $result=json_decode(CatagoriesModel::orderBy('id','desc')->take(10)->get());
        $result=CatagoriesModel::with(['sub_category'])->orderBy('id','desc')->take(10)->get();
        return response()->json($result);

    }

    function deleteCategoryData(Request $request){
        $id=$request->input('id');

        $result= CatagoriesModel::where('id',$id)->delete();

        if($result==true){

            return 1;
        }else{

            return 0;
        }


    }

    function getCategoryDetails(Request $req){
        $id= $req->input('id');
        $result=json_encode(CatagoriesModel::where('id','=',$id)->get());
        return $result;
    }

    function updateCategoryDetails(Request $request){

        $id=$request->input('id');
        $name=$request->input('name');
        $status=$request->input('status');


        $result=json_encode(CatagoriesModel::where('id',$id)->update([
            'name'=>$name,
            'status'=>$status,


        ]));

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }

    function insertCategory(Request $request){

        $name=$request->input('name');
        $status=$request->input('status');


        $result=json_encode(CatagoriesModel::insert([
            'name'=>$name,
            'status'=>$status

        ]));

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }

}
