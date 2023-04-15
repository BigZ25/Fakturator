<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsInObservationAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('observation_adverts', function (Blueprint $table) {
            $table->string('photo_link')->nullable()->after('name');
            $table->decimal('price',16,2)->nullable()->after('was_viewed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('observation_adverts', function (Blueprint $table) {
            //
        });
    }
}
