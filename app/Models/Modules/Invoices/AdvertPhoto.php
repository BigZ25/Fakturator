<?php

namespace App\Models\Modules\Invoices;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertPhoto extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'advert_id',
        'original_name',
        'key'
    ];

    public function advert()
    {
        return $this->belongsTo(Advert::class);
    }

    public function getData()
    {

    }
}
