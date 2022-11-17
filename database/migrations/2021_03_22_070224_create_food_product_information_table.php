<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodProductInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_product_information', function (Blueprint $table) {
            $table->increments('id');
			$table->char('attribute_name');
			$table->decimal('product_price',8,2)->default(0);
			$table->integer('stock')->nullable();
			$table->unsignedInteger('product_id');     
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
        Schema::dropIfExists('food_product_information');
    }
}
