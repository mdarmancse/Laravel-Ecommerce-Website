<?php

namespace App\Http\Controllers;

use App\PaymentModel;
use Illuminate\Http\Request;
use App\CustomerModel;
use App\ShippingModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Darryldecode\Cart\Cart;

class CheckoutController extends Controller
{
    function CheckoutIndex(){

        return view('Checkout');
    }
    function getData(){
        $id= Session::get('id');
       // $data['customer']=CustomerModel::where('customer_id',$id)->first();
        return view('Checkout');
       // dd($customer);
    }

    function updateData(Request $request){
//        dd($request->all());
        $customer_id=Session::get('id')
        $country=$request->input('country');
        $address=$request->input('address');
        $zip_code=$request->input('zip_code');
        $result=CustomerModel::where('customer_id',$customer_id)->update([

            'country'=>$country,
            'address'=>$address,
            'zip_code'=>$zip_code,

        ]);


        if ($result==true){

            Session::put('address',$address);
            Session::put('country',$country);
            Session::put('zip_code',$zip_code);

            $shipping=new ShippingModel();

            $shipping->shipping_name = Session::get('name');
            $shipping->email_address = Session::get('email');
            $shipping->mobile =Session::get('mobile');
            $shipping->address = $request->input('address');
            $shipping->country = $request->input('country');

            if($shipping->save()){

                $shipping_id=$shipping->shipping_id;
                $payment=new PaymentModel();
                $payment->payment_method=$request->payment_method;
                $payment->payment_status='1';
                if($payment->save()){
                    $payment_id=$payment->id;
                    $this->saveOrder($customer_id,$shipping_id,$payment_id);
                }


            }

        }
        else{

            return ("Update Failed");
        }




    }
    public function saveOrder($customer_id,$shipping_id,$payment_id)
    {


        $odata=array();

        $odata['customer_id']=$customer_id;
        $odata['shipping_id']=$shipping_id;
        $odata['payment_id']=$payment_id;
        $odata['order_total']=Session::get('total');
//        $odata['order_status']='pending';
        $order_id=DB::table('order')->insertGetId($odata);

        $oddata=array();

        $contents=\Cart::getContent();
        foreach($contents as $v_contents){

            $oddata['order_id']=$order_id;
            $oddata['product_id']=$v_contents->id;
            $oddata['product_name']=$v_contents->name;
            $oddata['product_price']=$v_contents->price;
            $oddata['product_sales_quantity']=$v_contents->quantity;
            DB::table('orderdetails')
                ->insert($oddata);

        }
        \Cart::clear();
        return redirect('/CheckoutIndex');


    }
}
