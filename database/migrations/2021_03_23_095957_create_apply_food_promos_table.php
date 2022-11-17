<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyFoodPromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_food_promos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('promo_id')->unsigned();
            $table->foreign('promo_id')->references('id')->on('food_promos')->onDelete('cascade');
            $table->integer('cart_id')->unsigned();
            $table->foreign('cart_id')->references('id')->on('food_carts')->onDelete('cascade');
            $table->unsignedBigInteger('app_user_id')->nullable();
            $table->foreign('app_user_id')->references('id')->on('food_app_users')->onDelete('cascade');
            $table->decimal('total',8,2);
            $table->decimal('grand_total',8,2);
            $table->decimal('discount_price',8,2);
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
        Schema::dropIfExists('apply_food_promos');
    }
}
