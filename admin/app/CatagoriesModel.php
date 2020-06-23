<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatagoriesModel extends Model
{
    public $table='catagories';
    public $primaryKey='id';
    public $incrementing=true;
    public $keyType='int';
    public  $timestamps=false;

    function sub_category(){
        return $this->hasmany(SubCatagoriesModel::class,'category_id','id');
    }

}
