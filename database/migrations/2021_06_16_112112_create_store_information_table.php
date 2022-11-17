<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('app_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('app_id')->references('id')->on('aboutapps')->onDelete('cascade');
            $table->longtext('promotional_text')->nullable();
            $table->string('app_subtitle')->nullable();
            $table->string('keywords')->nullable();
            $table->string('support_url')->nullable();
            $table->string('marketing_url')->nullable();
            $table->longtext('app_description')->nullable();
            $table->string('age_rating')->nullable();
            $table->string('app_country')->nullable();
            $table->string('privacy_policy_url')->nullable();
            $table->string('primary_language')->nullable();
            $table->string('primary_app_category')->nullable();
            $table->string('secondary_app_category')->nullable();
            $table->string('app_price')->nullable();
            $table->string('screenshots')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('number')->nullable();
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
        Schema::dropIfExists('store_information');
    }
}
