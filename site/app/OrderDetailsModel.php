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
}
