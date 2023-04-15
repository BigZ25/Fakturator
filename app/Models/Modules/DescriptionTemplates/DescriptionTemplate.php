<?php

namespace App\Models\Modules\DescriptionTemplates;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescriptionTemplate extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'text',
    ];

    public function getData()
    {

    }
}
