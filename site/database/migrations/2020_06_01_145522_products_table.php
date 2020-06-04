<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('products',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('name');
            $table->string('image');
            $table->string('description');
            $table->string('size');
            $table->string('colour');
            $table->string('quantity');
            $table->string('price');
            $table->tinyInteger('status')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
