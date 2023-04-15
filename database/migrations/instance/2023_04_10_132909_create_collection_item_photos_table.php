<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionItemPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_item_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collection_item_id');
            $table->string('original_name');
            $table->string('key')->unique();
            $table->foreign('collection_item_id')->references('id')->on('collection_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_item_photos');
    }
}
