<?php

namespace App\Http\Controllers\Modules;

use App\Classes\App\AppClass;
use App\Enum\Modules\Invoices\InvoiceOperationsEnum;
use App\Enum\Modules\Invoices\InvoiceStatusesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Modules\Invoices\InvoiceOperationRequest;
use App\Http\Requests\Modules\Invoices\InvoiceRequest;
use App\Models\Modules\Invoices\Invoice;
use App\Services\Modules\InvoicePhotosService;
use App\Services\Modules\InvoicesService;
use Illuminate\Http\Exceptions\HttpResponseException;

class InvoicesController extends Controller
{
    public function store(InvoiceRequest $request)
    {
        if ($request->has('import')) {
            if ($request->input('import') === "0") {
                $invoice = Invoice::create($request->validated() + ['status' => InvoiceStatusesEnum::NOT_POSTED]);

                InvoicePhotosService::storePhotos($request, $invoice);
                AppClass::addMessage('Ogłoszenie zostało zapisane');

                return response()->json(route('invoices.show', $invoice->id));
            } elseif ($request->input('import') === "1") {
                InvoicesService::importInvoices($request);
                AppClass::addMessage('Ogłoszenia zostały zaimportowane');

                return response()->json(route('invoices.index'));
            }
        }

        return response()->json(route('invoices.index'));
    }

    public function update(InvoiceRequest $request, Invoice $invoice)
    {
        $this->authorize('update', $invoice);

        $invoice->update($request->validated());

        InvoicePhotosService::storePhotos($request, $invoice);
        AppClass::addMessage('Zmiany zostały zapisane');

        return response()->json(route('invoices.show', $invoice->id));
    }

    /**
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function handleOperation(InvoiceOperationRequest $request)
    {
        $counter = 0;
        $mode = (int)$request->input('mode');
        $operation = (int)$request->input('operation');
        $id = (int)$request->input('id');
        $ids = $request->input('ids');
        $params = $request->has('category') ? ['category' => $request->input('category')] : [];

        if ($mode === 0) {
            $ids = Invoice::all()->pluck('id')->toArray();
        }

        foreach ($ids as $invoiceId) {
            $invoice = Invoice::find($invoiceId);

            if ($invoice) {
                $this->authorize('operation', $invoice);

                //jeśli ogłoszenie nie wystawione na OLX to odrazu usuwamy z fakturatora
                if ($operation === InvoiceOperationsEnum::DELETE && $invoice->is_active === false) {
                    $invoice->delete();
                } else {
                    if (InvoicesService::addToQueue($invoice, $operation, $params) === true) {
                        $counter++;
                    };
                }
            } else {
                throw new HttpResponseException(response()->json(['message' => "Ogłoszenie #$invoiceId nie istnieje."], 403));
            }
        }

        if ($counter === count($ids)) {
            $prefix = "Wszystkie";
        } elseif ($counter < count($ids)) {
            $prefix = "Niektóre";
        } else {
            $prefix = "Żadne";
        }

        if ($counter !== 0) {
            if ($operation === InvoiceOperationsEnum::DELETE) {
                $postfix = " Wkrótce zostaną usunięte.";
            } elseif ($operation === InvoiceOperationsEnum::ADD_TO_OLX) {
                $postfix = " Wkrótce zostaną wystawione.";
            } elseif ($operation === InvoiceOperationsEnum::MARK_AS_NOT_POSTED) {
                $postfix = " Wkrótce zostaną oznaczone.";
            }
        } else {
            $postfix = "";
        }

        $message = $prefix . " ogłoszenia zostały dodane do kolejki." . $postfix;

        AppClass::addMessage($message);

        if ($id) {
            return response()->json(route('invoices.show', $id));
        }

        return response()->json(route('invoices.index'));
    }
}
