<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueueOfAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queue_of_adverts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('advert_id');
            $table->unsignedSmallInteger('operation');
            $table->unsignedMediumInteger('response_code')->nullable();
            $table->string('response_message')->nullable();
            $table->string('params');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('executed_at')->nullable();
            $table->foreign('advert_id')->references('id')->on('adverts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queue_of_adverts');
    }
}
