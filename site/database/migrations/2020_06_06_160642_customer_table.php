<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer',function (Blueprint $table){
            $table->bigIncrements('customer_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email_address');
            $table->string('password');
            $table->string('telephone');
            $table->string('shipping_email');
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
