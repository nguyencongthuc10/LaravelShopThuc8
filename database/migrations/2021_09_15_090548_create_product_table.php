<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_table', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_brand')->unsigned(); // bắt buộc số nguy
            $table->string('name_product');
            $table->string('slug_product');
            $table->string('price_product');          
            $table->string('discount_price_product');
            $table->integer('status_product');
            $table->text('desc_product');
            $table->text('content_product');
            $table->string('image_product');
            $table->string('detail1_image_product');
            $table->string('detail2_image_product');
            $table->string('detail3_image_product');
            $table->string('detail4_image_product');   
            $table->string('classify_product');  
            $table->integer('highlight_product');
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
        Schema::dropIfExists('product_table');
    }
}
