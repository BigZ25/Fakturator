<?php

use App\Models\Modules\DescriptionTemplates\DescriptionTemplate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescriptionTemplatesTable extends Migration
{
    public function up()
    {
        Schema::create('description_templates', function (Blueprint $table) {
            $table->id();
            $table->text('text');
        });

        $text = file_get_contents(database_path('default_description_template.txt'));

        DescriptionTemplate::create([
            'text' => $text,
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('description_templates');
    }
}
