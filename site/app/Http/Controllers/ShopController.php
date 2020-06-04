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

       $data['ProductData']=ProductModel::all();

        return view('Shop',$data);
    }
//subcategory_table.id=1
//product.subcategory_id_filed=1
    function ShowProductBYID($id){
        $data['CatagoriesData']=CatagoriesModel::with('sub_category')->get();

        $data['ProductData']=ProductModel::where('subcategory_id',$id)->get();

             return view('Shop',$data);

    }
}
