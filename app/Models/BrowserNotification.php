<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class BrowserNotification extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'was_viewed',
        'was_showed',
        'link'
    ];

    public function getData()
    {

    }
}
