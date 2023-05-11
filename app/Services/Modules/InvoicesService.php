<?php

namespace App\Services\Modules;

use App\Classes\App\AppClass;
use App\Http\Requests\Modules\Invoices\InvoiceRequest;
use App\Models\Modules\Invoices\Invoice;
use App\Models\Modules\Invoices\InvoiceItem;
use JsonException;

class InvoicesService
{
    public static function handleRequest(InvoiceRequest $request, Invoice $invoice = null)
    {
        if (!auth()->user()->company_data_complete) {
            throw new JsonException('Dane firmy są niekompletne. Można je uzupełnić w ustawieniach.');
        }

        $data = $request->validated() + [
                'seller_name' => auth()->user()->company_name,
                'seller_nip' => auth()->user()->company_nip,
                'seller_address' => auth()->user()->company_address,
                'seller_postcode' => auth()->user()->company_postcode,
                'seller_city' => auth()->user()->company_city,
            ];

        if ($invoice === null) {
            $data['user_id'] = auth()->user()->id;
            $invoice = Invoice::create($data);
            InvoiceItem::saveData($request, $invoice->id, 'invoice_id');
            $message = 'Faktura została zapisana';
        } else {
            $invoice->update($data);
            InvoiceItem::saveData($request, $invoice->id, 'invoice_id');
            $message = 'Zmiany zostały zapisane';
        }

        AppClass::addMessage($message);

        return $invoice;
    }
}
