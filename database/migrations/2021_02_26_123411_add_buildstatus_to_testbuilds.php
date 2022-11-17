<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBuildstatusToTestbuilds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testbuilds', function (Blueprint $table) {
            //
            $table->string('status_a')->nullable();
            $table->string('status_i')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testbuilds', function (Blueprint $table) {
            //
        });
    }
}
