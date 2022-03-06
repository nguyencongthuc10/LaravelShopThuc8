<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUser1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user1_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_user');
            $table->string('email_or_phone_user');
            $table->string('role')->default('0');
            $table->string('password');
            $table->string('cart_token');
            $table->string('token_user');
            $table->rememberToken();
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
        Schema::dropIfExists('user1_table');
    }
}
