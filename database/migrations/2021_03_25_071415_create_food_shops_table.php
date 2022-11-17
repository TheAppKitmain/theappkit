<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_shops', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('template_id');
            $table->foreign('template_id')->references('id')->on('theme_templates')->onDelete('cascade');
            $table->unsignedBigInteger('app_user_id')->nullable();
            $table->foreign('app_user_id')->references('id')->on('food_app_users')->onDelete('cascade');
            $table->char('shop_name');
            $table->text('shop_descrption')->nullable();
            $table->string('shop_image')->nullable();
            $table->char('shop_location')->nullable();
            $table->char('shop_lat')->default('47.517201');
            $table->char('shop_long')->default('65.742188');
            $table->char('currency')->default('gbp');
            $table->char('currency_symbol')->default('&pound;');
            $table->decimal('delivery_charges',8,2)->default(0);
            $table->enum('status',['active','inactive'])->default('inactive');
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
        Schema::dropIfExists('food_shops');
    }
}
