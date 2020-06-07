<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingModel extends Model
{
    public $table='shipping';
    public $primaryKey='shipping_id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;
}
