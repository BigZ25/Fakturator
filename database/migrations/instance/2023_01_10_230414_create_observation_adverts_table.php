<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservationAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observation_adverts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('observation_id');
            $table->unsignedBigInteger('advert_id');
            $table->unsignedSmallInteger('website');
            $table->tinyInteger('was_viewed');
            $table->string('link');
            $table->string('name');
            $table->dateTime('created_at')->nullable();
            $table->foreign('observation_id')->references('id')->on('observations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('observation_adverts');
    }
}
