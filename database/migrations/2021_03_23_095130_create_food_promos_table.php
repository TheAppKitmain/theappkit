<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodPromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_promos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('template_id');
            $table->foreign('template_id')->references('id')->on('theme_templates')->onDelete('cascade');
            $table->char('promo_code')->unique();
            $table->text('description')->nullable();
            $table->enum('promo_type',['discount','amount'])->default('discount');
            $table->enum('user_limit',['single','multiple'])->default('single');
            $table->char('discount')->default(0);
            $table->decimal('amount',8,2)->default(0);
            $table->decimal('cart_amount',8,2)->default(0);
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
        Schema::dropIfExists('food_promos');
    }
}
