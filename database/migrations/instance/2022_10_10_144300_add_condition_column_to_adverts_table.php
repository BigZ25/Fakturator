<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConditionColumnToAdvertsTable extends Migration
{
    public function up()
    {
        Schema::table('adverts', function (Blueprint $table) {
            $table->string('condition', 50)->nullable()->after('olx_link');
        });
    }

    public function down()
    {
        Schema::table('adverts', function (Blueprint $table) {
            //
        });
    }
}
