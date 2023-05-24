<?php

namespace App\Http\Controllers\Modules;

use App\Classes\App\AppClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\Modules\Invoices\InvoiceRequest;
use App\Models\Modules\Invoices\Invoice;
use App\Services\Modules\InvoicesService;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class InvoicesController extends Controller
{
    public function store(InvoiceRequest $request)
    {
        $this->authorize('isActive', Invoice::class);

        $invoice = InvoicesService::handleRequest($request);

        return response()->json(route('invoices.show', $invoice->id));
    }

    public function update(InvoiceRequest $request, Invoice $invoice)
    {
        $this->authorize('isInvoiceUser', $invoice);

        $invoice = InvoicesService::handleRequest($request, $invoice);

        return response()->json(route('invoices.show', $invoice->id));
    }

    public function destroy($invoiceId)
    {
        if (request()->has('ids') && (int)$invoiceId === 0) {
            $invoices = Invoice::query()
                ->whereIn('id', request()->input('ids'))
                ->get();

            foreach ($invoices as $invoice) {
                $this->authorize('isInvoiceUser', $invoice);
                $invoice->delete();
            }

            AppClass::addMessage('Faktury zostały usunięte');
        } else {
            $invoice = Invoice::find($invoiceId);

            if ($invoice) {
                $this->authorize('isInvoiceUser', $invoice);
                $invoice->delete();

                AppClass::addMessage('Faktura została usunięta');
            }
        }

        return response()->json(route('invoices.index'));
    }

    public function pdf($invoiceId)
    {
        $invoice = Invoice::find($invoiceId);

        $this->authorize('isInvoiceUser', $invoice);

        return PDF::loadView('templates.pdf.invoice', ['invoice' => $invoice])
            ->stream('Faktura VAT nr ' . $invoice->number . '.pdf');
    }
}
