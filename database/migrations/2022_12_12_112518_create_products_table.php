<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('product_price');
            $table->text('product_short_description');
            $table->text('product_long_description');
            $table->string('product_image');
            $table->string('product_id');
            $table->integer('product_category_id');
            $table->string('product_category_name');
            $table->integer('product_sub_category_id');
            $table->string('product_sub_category_name');
            $table->string('product_brand_name');
            $table->integer('product_brand_id');
            $table->string('slug');
            $table->string('product_size');
            $table->string('product_color');
            $table->string('status')->default('active');
            $table->integer('product_quantity')->default(0);
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
        Schema::dropIfExists('products');
    }
};
