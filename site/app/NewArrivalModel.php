<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewArrivalModel extends Model
{
    public $table='newarrival';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;
}
