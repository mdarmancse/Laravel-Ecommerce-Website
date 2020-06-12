<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetailsModel extends Model
{
    public $table='orderdetails';
    public $primaryKey='order_details_id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;

//    function orderId(){
//        return $this->hasmany(OrderModel::class,'order_id','id');
//    }
//    function productId(){
//        return $this->hasmany(ProductModel::class,'product_id','id');
//    }
}
