<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CatagoriesModel;

class SubCatagoriesModel extends Model
{
    public $table='subcatagories';

    public  $timestamps=false;

    //foreign key=>category_Id   //foreign key to primary key == belongsTo
    function category_b(){
        return $this->belongsTo(CatagoriesModel::class,'category_id','id');
    }

}




