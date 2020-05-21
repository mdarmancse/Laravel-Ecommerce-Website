<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferModel extends Model
{
    public $table='offers';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;
}
