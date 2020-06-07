<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    public $table='customer';
    public $primaryKey='customer_id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;
}
