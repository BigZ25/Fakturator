<?php

namespace App\Http\Controllers\Modules;

use App\Classes\App\AppClass;
use App\Enum\Modules\Invoices\InvoiceOperationsEnum;
use App\Enum\Modules\Invoices\InvoiceStatusesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Modules\Invoices\InvoiceOperationRequest;
use App\Http\Requests\Modules\Invoices\InvoiceRequest;
use App\Models\Modules\Invoices\Invoice;
use App\Models\Modules\Invoices\InvoiceItem;
use App\Services\Modules\InvoicePhotosService;
use App\Services\Modules\InvoicesService;
use Illuminate\Http\Exceptions\HttpResponseException;
use niklasravnsborg\LaravelPdf\Pdf;

class InvoicesController extends Controller
{
    public function store(InvoiceRequest $request)
    {
        $invoice = Invoice::create($request->validated() + ['user_id' => auth()->user()->id]);
        InvoiceItem::saveData($request->validated(), $invoice->id, 'invoice_id');

        AppClass::addMessage('Ogłoszenie zostało zapisane');

        return response()->json(route('invoices.show', $invoice->id));
    }

    public function update(InvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update($request->validated());
        InvoiceItem::saveData($request, $invoice->id, 'invoice_id');

        AppClass::addMessage('Zmiany zostały zapisane');

        return response()->json(route('invoices.show', $invoice->id));
    }

    public function destroy($invoiceId)
    {
        if (request()->has('ids') && (int)$invoiceId === 0) {
            $invoices = Invoice::query()
                ->whereIn('id', request()->input('ids'))
                ->get();

            foreach ($invoices as $invoice) {
                $invoice->delete();
            }

            AppClass::addMessage('Faktury zostały usunięte');
        } else {
            $invoice = Invoice::find($invoiceId);

            if ($invoice) {
                $invoice->delete();

                AppClass::addMessage('Faktura została usunięta');
            }
        }

        return response()->json(route('invoices.index'));
    }

    public function pdf(int $invoiceID)
    {
        $invoice = Invoice::find($invoiceID);
        $invoice->getItems();

        if ($invoice->correction_id) {
            $invoice->correction = Invoice::find($invoice->correction_id);
            $invoice->correction->getItems();
        }

//        $invoice->totalInWords = (new NumberToWords())->getCurrencyTransformer('pl')->toWords(str_replace(".", "", $invoice->brutto), 'PLN');

        return PDF::loadView('templates.pdf.invoice', ['invoice' => $invoice])
            ->stream('Faktura VAT nr ' . $invoice->number . '.pdf');
    }
}
