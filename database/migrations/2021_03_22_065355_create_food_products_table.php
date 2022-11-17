<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('template_id');
            $table->foreign('template_id')->references('id')->on('theme_templates')->onDelete('cascade');
            $table->char('category_id');
            $table->enum('product_type',['simple','variable'])->default('simple');
            $table->char('product_name');
            $table->text('short_description');
            $table->longText('long_description')->nullable();
            $table->decimal('price',8,2)->default(0);
            $table->integer('product_stock')->default(0);
            $table->string('product_image')->nullable();
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->integer('position')->default(0);
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
        Schema::dropIfExists('food_products');
    }
}
