<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCatagoriesModel;
use Illuminate\Support\Facades\DB;

class SubCategoriesController extends Controller
{
    function SubCategoriesIndex(){

        return view('SubCategories');

    }

    function getSubCategoryData(){

       $result=SubCatagoriesModel::with(['category_b'])->orderBy('id','desc')->take(10)->get();
      /*  $result=DB::table('subcatagories')
            ->join('catagories', 'subcatagories.category_id', '=', 'catagories.id') //category=  (1=1)
            ->select('subcatagories.*', 'catagories.name')
            ->get();*/

        return $result;

    }

    function deleteSubCategoryData(Request $request){
        $id=$request->input('id');

        $result= SubCatagoriesModel::where('id',$id)->delete();

        if($result==true){

            return 1;
        }else{

            return 0;
        }


    }

    function getSubCategoryDetails(Request $req){
        $id= $req->input('id');
        $result=json_encode(SubCatagoriesModel::where('id','=',$id)->get());
        return $result;
    }

    function updateSubCategoryDetails(Request $request){

        $id=$request->input('id');
        $category_id=$request->input('category_id');
        $sub_cat_name=$request->input('sub_cat_name');
        $status=$request->input('status');


        $result=json_encode(SubCatagoriesModel::where('id',$id)->update([
            'category_id'=>$category_id,
            'sub_cat_name'=>$sub_cat_name,
            'status'=>$status,


        ]));

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }

    function insertSubCategory(Request $request){

        $category_id=$request->input('category_id');
        $sub_cat_name=$request->input('sub_cat_name');
        $status=$request->input('status');

        $result=json_encode(SubCatagoriesModel::insert([
            'category_id'=>$category_id,
            'sub_cat_name'=>$sub_cat_name,
            'status'=>$status,

        ]));

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }

}
