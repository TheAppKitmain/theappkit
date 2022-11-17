<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('template_id')->nullable();
            $table->foreign('template_id')->references('id')->on('theme_templates')->onDelete('cascade');
            $table->char('shop_name');
            $table->text('shop_descrption')->nullable();
            $table->string('shop_image')->nullable();
            $table->char('shop_location')->nullable();
            $table->char('shop_lat')->default('51.502077080000000');
            $table->char('shop_long')->default('-0.229305834000000');
            $table->char('currency')->default('gbp');
            $table->char('currency_symbol')->default('&pound;');
            $table->char('vat')->default('20');
            $table->char('servicefee')->default('2.99');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->unsignedBigInteger('app_user_id')->nullable();
            $table->foreign('app_user_id')->references('id')->on('booking_app_users')->onDelete('cascade');
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
        Schema::dropIfExists('booking_shops');
    }
}
