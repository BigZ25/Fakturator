<?php

use App\Models\AccessToken;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampColumnToAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('access_tokens', function (Blueprint $table) {
            $table->integer('timestamp')->nullable();
        });

        $accessTokens = AccessToken::all();

        foreach ($accessTokens as $accessToken) {
            $accessToken->update(['timestamp' => currentUnixTimestamp() - 86400]);
        }

        Schema::table('access_tokens', function (Blueprint $table) {
            $table->integer('timestamp')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('access_tokens', function (Blueprint $table) {
            //
        });
    }
}
