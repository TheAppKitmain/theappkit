<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedInteger('role_id');
            $table->string('business_name');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('number')->unique();
            $table->string('email')->unique();
            $table->string('country');
            $table->string('password');
            $table->string('user_type')->nullable();
            $table->smallInteger('is_email_verified')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->string('expiry_date')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
