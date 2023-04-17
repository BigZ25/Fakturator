<?php

namespace App\Models\Modules\Observations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObservationInvoice extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'observation_id',
        'invoice_id',
        'was_viewed',
        'link',
        'name',
        'website',
        'price',
        'photo_link',
    ];

    public function getData()
    {

    }
}
