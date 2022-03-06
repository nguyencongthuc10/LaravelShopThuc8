<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_brand');
            $table->string('slug_brand');
            $table->string('image_brand');
            $table->string('desc_brand');
            $table->integer('status_brand');
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
        Schema::dropIfExists('brand_table');
    }
}
