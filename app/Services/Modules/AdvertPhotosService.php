<?php

namespace App\Services\Modules;

use App\Http\Requests\Modules\Invoices\InvoiceRequest;
use App\Models\Modules\Invoices\Invoice;
use App\Models\Modules\Invoices\InvoicePhoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InvoicePhotosService
{
    public static function storePhotos(InvoiceRequest $request, Invoice $invoice)
    {
        $invoice->photos()->delete();

        if ($request->hasFile('photos')) {
            $allowedFileExtension = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'];
            $files = $request->file('photos');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $original_name = $file->getClientOriginalName();
                $check = in_array($extension, $allowedFileExtension);

                if ($check === true) {
                    $invoicePhoto = InvoicePhoto::create([
                        'invoice_id' => $invoice->id,
                        'original_name' => $original_name,
                        'key' => md5(Str::random()),
                    ]);

                    if ($invoicePhoto) {
                        Storage::disk('photos')->put($invoicePhoto->key, $file->getContent());
                    }
                }
            }
        }
    }
}
