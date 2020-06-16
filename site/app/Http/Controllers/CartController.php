<?php

namespace App\Http\Controllers;
use App\ProductModel;
use App\OrderDetailsModel;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Session;
use Validator;
class CartController extends Controller
{
    function CartIndex()
    {

        return view('Cart');
    }

    function addCart($id)
    {

        $product = ProductModel::where('id', $id)->first();

        \Cart::add(array(
            'id' => $id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(
                'size' => $product->size,
                'color' => $product->colour,

            ),
        ));


        return redirect()->back();
    }
    function addCartModal(Request $request)
    {
        $product = ProductModel::where('id', $request->id)->first();
        \Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->qty,
            'attributes' => array(
                'size' => $request->size,
                'color' => $product->colour,
            ),
        ));

        return $product;
    }
//
//    function updateQty(Request $request){
//        $id=$request->input('id');
//
//        $product=ProductModel::where('id',$id)->first();
//        $itemId=\Cart::get($id);
//
//        $summedPrice = Cart::get($itemId)->getPriceSum();
//        \Cart::update($itemId, array(
//
//            'quantity'=>$product->quantity,
//            ));
//
//        return redirect()->back();
//    }

//
    function clearCart()
    {

//        \Cart::remove($id);

        \Cart::clear();
        return redirect()->back();
    }


    public function updateQty(Request $request){

        \Cart::update($request->id, array(
            'quantity' => $request->quantity,
        ));

        return redirect()->back();

    }

}
