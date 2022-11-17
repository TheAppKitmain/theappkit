<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('app_user_id')->nullable();
            $table->foreign('app_user_id')->references('id')->on('booking_app_users')->onDelete('cascade');
            $table->string('stripe_id');
            $table->enum('booking_type',['0','1','2'])->default(0); 
            $table->string('payment_recipt')->nullable();
            $table->integer('cartype_id');
            $table->char('licence_plate');
            $table->char('make');
            $table->char('model');
            $table->char('year');
            $table->integer('deal_id');
            $table->date('date');
            $table->time('time');
            $table->char('order_no')->nullable();
            $table->integer('apply_promo_id')->nullable();
            $table->integer('vat');
            $table->decimal('service_fee',8,2);
            $table->decimal('total',8,2);
            $table->enum('status',['0','1','2','3','4'])->default(0);
            $table->dateTime('booking_datetime', 0);
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
        Schema::dropIfExists('booking_orders');
    }
}
