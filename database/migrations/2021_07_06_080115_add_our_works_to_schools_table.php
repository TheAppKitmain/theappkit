<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOurWorksToSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('our_works', function (Blueprint $table) {
            $table->string('client_designation')->nullable()->after('client_name');
            $table->string('app_android_link')->nullable()->after('app_links');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('our_works', function (Blueprint $table) {
            //
        });
    }
}
