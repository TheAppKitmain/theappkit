<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcommerceProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecommerce_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('template_id')->nullable();
            $table->string('collection_name');
            $table->string('product_name');
            $table->string('slug')->unique()->nullable();
            $table->longText('product_description');
            $table->string('product_image');
            $table->string('product_display_image_1')->nullable();
            $table->string('product_display_image_2')->nullable();
            $table->string('product_display_image_3')->nullable();
            $table->string('product_price');
            $table->string('product_type');
            $table->string('sale_price')->nullable();
            $table->string('stock_unit')->nullable();
            $table->string('stock_qty')->nullable();
            $table->string('shipping_weight')->nullable();
            $table->string('shipping_length')->nullable();
            $table->string('shipping_width')->nullable();
            $table->string('shipping_height')->nullable();
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
        Schema::dropIfExists('ecommerce_products');
    }
}
