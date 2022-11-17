<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalUpdateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_update_notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('note_id')->nullable();
            $table->foreign('note_id')->references('id')->on('internal_updates')->onDelete('cascade');
            $table->text('note_reply');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('internal_update_notes');
    }
}
