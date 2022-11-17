<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropAppSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('collections');
        Schema::dropIfExists('product_attributes');
        Schema::dropIfExists('product_categories');
        Schema::dropIfExists('product_variations');
        Schema::dropIfExists('splash_screens');
        Schema::dropIfExists('products');
        Schema::dropIfExists('app_settings');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
