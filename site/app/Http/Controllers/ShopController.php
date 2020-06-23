<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatagoriesModel;
use App\SubCatagoriesModel;
use App\ProductModel;
use Illuminate\Support\Facades\DB;


class ShopController extends Controller
{
    function ShopIndex(){

$data['CatagoriesData']=CatagoriesModel::with('sub_category')->get();

//        $SubCatagoriesData=SubCatagoriesModel::get();

       $data['ProductData']=ProductModel::get();

        return view('Shop',$data);
    }
//subcategory_table.id=1
//product.subcategory_id_filed=1
    function ShowProductBYID($id){
        $data['CatagoriesData']=CatagoriesModel::with('sub_category')->get();

        $data['ProductData']=ProductModel::where('subcategory_id',$id)->get();

             return view('Shop',$data);

    }

    function modalData(Request $request){
        $result=ProductModel::where('id',$request->id)->first();
        $size=$result->size;
        $product_size=explode(',',$size);
        $color=$result->colour;
        $product_color=explode(',',$color);
        echo json_encode(array($result,$product_size,$product_color),JSON_FORCE_OBJECT);
       // return ;

    }
//    function modalData2(Request $request){
//        $result=ProductModel::where('id',$request->id)->first();
//        $size=$result->size;
//        $product_size=explode(',',$size);
//        return json_encode($product_size,JSON_FORCE_OBJECT);
//      //  return $size;
//
//    }




    function modalColor(Request $request){
        $result=ProductModel::where('id',$request->id)->first();
//        $color=$result->color;
//       $product_color=explode(',',$color);
//        return $product_color;
        return $result;

    }
}
