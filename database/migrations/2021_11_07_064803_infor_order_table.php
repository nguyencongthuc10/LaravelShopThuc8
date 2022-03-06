<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InforOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_order_table', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('info_customer_id');
            $table->string('info_name');
            $table->string('info_phone');
            $table->string('info_city');
            $table->string('info_address');
            $table->string('info_note');
            $table->string('info_email');
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
        Schema::dropIfExists('info_order_table');
    }
}
