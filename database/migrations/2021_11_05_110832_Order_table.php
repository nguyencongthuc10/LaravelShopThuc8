<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_table', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->string('order_image');
            $table->string('order_name');
            $table->string('order_qty');
            $table->string('order_price');
            $table->string('order_total');
            $table->string('order_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_table');
    }
}
