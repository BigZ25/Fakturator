<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Modules\Invoices\Invoice;
use App\Models\Modules\Invoices\InvoicePhoto;
use Illuminate\Support\Facades\Storage;

class InvoicePhotosController extends Controller
{
    public function show(Invoice $invoice, InvoicePhoto $photo)
    {
        return Storage::disk('photos')->response($photo->key);
    }
}
