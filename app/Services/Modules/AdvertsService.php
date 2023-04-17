<?php

namespace App\Services\Modules;

use App\Classes\App\AppClass;
use App\Enum\Modules\Invoices\InvoiceCategoriesEnum;
use App\Enum\Modules\Invoices\InvoiceStatusesEnum;
use App\Enum\Modules\Invoices\InvoiceOperationsEnum;
use App\Enum\Modules\DescriptionTemplates\DescriptionTemplateParametersEnum;
use App\Enum\OlxApi\InvoiceOlxStatusesEnum;
use App\Http\InvoiceImport;
use App\Http\APIClient;
use App\Http\Requests\Modules\Invoices\InvoiceRequest;
use App\Models\Modules\Invoices\Invoice;
use App\Models\Modules\Invoices\QueueOfInvoice;
use App\Models\Modules\DescriptionTemplates\DescriptionTemplate;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

class InvoicesService
{
    public static function importInvoices(InvoiceRequest $request)
    {
        if ($request->hasFile('files')) {
            $allowedFileExtension = ['csv', 'xls', 'xlsx'];

            $files = $request->file('files');

            foreach ($files as $file) {

                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedFileExtension);

                if ($check === true) {
                    $import = new InvoiceImport;
                    Excel::Import($import, $file);
                    $invoices = $import->getInvoices();
                    foreach ($invoices as $invoice) {
                        Invoice::create($invoice + ['status' => InvoiceStatusesEnum::NOT_POSTED]);
                    }
                }
            }
        }
    }

    /**
     * @throws Exception
     */
    public static function addToQueue(Invoice $invoice, $operation, $params = [])
    {
        $data = [
            'invoice_id' => $invoice->id,
            'operation' => $operation,
            'params' => json_encode($params),
            'created_at' => currentDateTime(),
        ];

        QueueOfInvoice::create($data);

        return true;
    }

    /**
     * @throws Exception
     */
    public static function addToOlx($id, int $category = InvoiceCategoriesEnum::ANTIQUES_AND_COLLECTIONS_OTHER_COLLECTIONS)
    {
        $invoice = Invoice::find($id);

        if ($invoice && !$invoice->is_active) {
            $data = InvoicesService::prepareData($invoice, $category);
            $response = APIClient::addInvoice($data);

            if ($response->isOk() === true) {
                $data = $response->getOriginalContent()['data'];

                $invoice->update([
                    'olx_id' => $data['id'],
                    'olx_link' => $data['url'],
                    'olx_status' => $data['status'],
                    'status' => InvoiceStatusesEnum::POSTED,
                ]);
            }

            return [
                'code' => $response->getStatusCode(),
                'message' => $response->isOk() ? $response->statusText() : $response->getData(),
            ];
        }

        return false;
    }

    public static function removeFromOlx($id)
    {
        $invoice = Invoice::find($id);

        if ($invoice) {
            $response = APIClient::removeInvoice($invoice->olx_id);

            if ($response->isOk() === true) {
                $invoice->update([
                    'status' => InvoiceStatusesEnum::NOT_POSTED,
                    'olx_status' => InvoiceOlxStatusesEnum::REMOVED_BY_USER,
                ]);

                $invoice->delete();
            }

            return [
                'code' => $response->getStatusCode(),
                'message' => $response->statusText(),
            ];
        }

        return false;
    }

    public static function markAsNotPosted($id)
    {
        $invoice = Invoice::find($id);

        if ($invoice) {
            $invoice->update([
                'olx_link' => null,
                'olx_status' => null,
                'olx_id' => null,
                'last_olx_update_at' => null,
                'status' => InvoiceStatusesEnum::NOT_POSTED,
            ]);

            return [
                'code' => 200,
                'message' => 'OK',
            ];
        }

        return false;
    }

    private static function prepareData($invoice, $category): array
    {
        $images = [];

        foreach ($invoice->photos as $photo) {
            $images[] = [
                'url' => route('invoices.photos.show', [$photo->invoice_id, $photo->id]),
            ];
        }

        $description = DescriptionTemplate::first();

        if (!$description) {
            throw new Exception("Brak wzoru opisu");
        } else {
            $text = $description->text;
            $parameters = DescriptionTemplateParametersEnum::getAttributes();

            foreach ($parameters as $parameter) {
                if (!$invoice[$parameter['attribute']]) {
                    throw new Exception("Pusta wartość dla parametru " . $parameter['text']);
                }
                $text = str_replace("<" . $parameter['text'] . ">", $invoice[$parameter['attribute']], $text);
            }
        }

        return [
            'title' => $invoice->full_name_with_item_number,
            'description' => $text,
            'category_id' => $category,
            'invoiceiser_type' => 'private',
            'contact' => [
                'name' => 'Mateusz',
            ],
            'location' => [
                'city_id' => '130999',
            ],
            'price' => [
                'value' => $invoice->price,
                'currency' => 'PLN',
            ],
            'attributes' => [
                [
                    //przedmiot nowy
                    'code' => 'state',
                    'value' => 'new',
                ],
            ],
            'images' => $images,
        ];
    }
}
