<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToThemeTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theme_templates', function (Blueprint $table) {
            $table->string('monthly_gbp')->nullable()->after('theme_screenshots');
            $table->string('yearly_gbp')->nullable()->after('monthly_gbp');
            $table->string('monthly_usd')->nullable()->after('yearly_gbp');
            $table->string('yearly_usd')->nullable()->after('monthly_usd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('theme_templates', function (Blueprint $table) {
            //
        });
    }
}
