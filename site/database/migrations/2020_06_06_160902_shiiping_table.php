<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShiipingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping',function (Blueprint $table){
            $table->bigIncrements('shipping_id');
            $table->string('customer_name');
            $table->string('email_address');
            $table->string('password');
            $table->string('mobile');
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('zip_code')->nullable();
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
