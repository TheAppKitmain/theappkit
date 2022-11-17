<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcommerceAppSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecommerce_app_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('theme_name');
            $table->string('nav_bg_color');
            $table->string('nav_heading_color');
            $table->string('nav_heading_font');
            $table->string('heading_color');
            $table->string('heading_font');
            $table->string('sub_heading_color');
            $table->string('sub_heading_font');
            $table->string('paragraph_color');
            $table->string('paragraph_font');
            $table->string('primary_btn_color');
            $table->string('primary_btn_font');
            $table->string('primary_btnbg_color');
            $table->string('success_btn_color');
            $table->string('success_btn_font');
            $table->string('success_btnbg_color');
            $table->string('danger_btn_color');
            $table->string('danger_btn_font');
            $table->string('danger_btnbg_color');
            $table->string('screen_bg_color');
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
        Schema::dropIfExists('ecommerce_app_settings');
    }
}
