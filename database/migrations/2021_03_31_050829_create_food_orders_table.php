<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('template_id');
            $table->foreign('template_id')->references('id')->on('theme_templates')->onDelete('cascade');
            $table->unsignedBigInteger('app_user_id')->nullable();
            $table->foreign('app_user_id')->references('id')->on('food_app_users')->onDelete('cascade');
            $table->integer('cart_id')->unsigned();
            $table->foreign('cart_id')->references('id')->on('food_carts')->onDelete('cascade');
            $table->integer('apply_promo_id')->unsigned()->nullable();
            $table->foreign('apply_promo_id')->references('id')->on('apply_food_promos')->onDelete('cascade');
            $table->char('order_no')->nullable();
            $table->decimal('subtotal',8,2);
            $table->decimal('total',8,2);
            $table->text('order_charges');
            $table->text('order_customers');
            $table->char('schedule');
            $table->enum('status',['0','1','2'])->nullable();
            $table->datetime('delivered_at')->nullable();
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
        Schema::dropIfExists('food_orders');
    }
}
