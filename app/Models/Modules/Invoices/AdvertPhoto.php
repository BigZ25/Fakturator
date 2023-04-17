<?php

namespace App\Models\Modules\Invoices;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicePhoto extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'invoice_id',
        'original_name',
        'key'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function getData()
    {

    }
}
