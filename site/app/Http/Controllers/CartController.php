<?php

namespace App\Http\Controllers;
use App\ProductModel;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use Validator;
class CartController extends Controller
{
    function CartIndex(){

        return view('Cart');
    }
    function addCart($id){

        $product=ProductModel::where('id',$id)->first();

        \Cart::add(array(
                'id' =>$id ,
                'name' => $product->name,
                'price' => $product->price,
                'quantity'=>$product->quantity,
                'attributes' => array(
                    'size' => $product->size,
                    'color' =>$product->color,

            ),
        ));


return redirect()->back();
    }

    function updateCart(Request $request){
        $id=$request->input('id');

        $product=ProductModel::where('id',$id)->first();


        $itemId=\Cart::get($id);

        $summedPrice = Cart::get($itemId)->getPriceSum();
        \Cart::update($itemId, array(

            'quantity'=>$product->quantity,
            ));

        return redirect()->back();
    }


    function clearCart(){

        \Cart::clear();
        return redirect()->back();
    }
    function updateQty(Request $request){
        \Cart::update($request->id, array(
            'quantity' => $request->quantity,
            // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));
        return redirect()->back();
    }




}
