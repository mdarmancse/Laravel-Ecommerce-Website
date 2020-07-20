<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductModel;

class ProductController extends Controller
{
    function ProductsIndex(){

        return view('Products');

    }

    function getProductsData(){

        $result=json_decode(ProductModel::orderBy('id','desc')->take(10)->get());
        return $result;

    }

    function deleteProductsData(Request $request){
        $id=$request->input('id');

        $result= ProductModel::where('id',$id)->delete();

        if($result==true){

            return 1;
        }else{

            return 0;
        }


    }

    function getProductsDetails(Request $req){
        $id= $req->input('id');
        $result=json_encode(ProductModel::where('id','=',$id)->get());
        return $result;
    }

    function updateProductsDetails(Request $request){

        $id=$request->input('id');
        $category_id=$request->input('category_id');
        $subcategory_id	=$request->input('subcategory_id');
        $name=$request->input('name');
        $image=$request->input('image');
        $description=$request->input('description');
        $size=$request->input('size');
        $colour=$request->input('colour');
        $quantity=$request->input('quantity');
        $price=$request->input('price');
        $status=$request->input('status');


        $result=json_encode(ProductModel::where('id',$id)->update([
            'category_id'=>$category_id,
            'subcategory_id'=>$subcategory_id,
            'name'=>$name,
            'image'=>$image,
            'description'=>$description,
            'size'=>$size,
            'colour'=>$colour,
            'quantity'=>$quantity,
            'price'=>$price,
            'status'=>$status,



        ]));

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }

    function insertProducts(Request $request){

        $category_id=$request->input('category_id');
        $subcategory_id	=$request->input('subcategory_id');
        $name=$request->input('name');
        $image=$request->input('image');
        $description=$request->input('description');
        $size=$request->input('size');
        $colour=$request->input('colour');
        $quantity=$request->input('quantity');
        $price=$request->input('price');
        $status=$request->input('status');



        $result=json_encode(ProductModel::insert([
            'category_id'=>$category_id,
            'subcategory_id'=>$subcategory_id,
            'name'=>$name,
            'image'=>$image,
            'description'=>$description,
            'size'=>$size,
            'colour'=>$colour,
            'quantity'=>$quantity,
            'price'=>$price,
            'status'=>$status,

        ]));

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
