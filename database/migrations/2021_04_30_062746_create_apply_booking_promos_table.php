<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyBookingPromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_booking_promos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('promo_id');
            $table->unsignedBigInteger('app_user_id')->nullable();
            $table->foreign('app_user_id')->references('id')->on('booking_app_users')->onDelete('cascade');
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
        Schema::dropIfExists('apply_booking_promos');
    }
}
