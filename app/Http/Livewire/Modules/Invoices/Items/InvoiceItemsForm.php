<?php

namespace App\Http\Livewire\Modules\Invoices\Items;

use App\Enum\App\UnitsEnum;
use App\Enum\App\VatTypesEnum;
use App\Http\Livewire\BaseComponents\BaseItemsFormComponent;
use App\Models\Modules\Invoices\Invoice;
use App\Models\Modules\Invoices\InvoiceItem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InvoiceItemsForm extends BaseItemsFormComponent
{
    use  AuthorizesRequests;

    public function mount(?int $invoiceId)
    {
        $this->view_path = 'modules.invoices.items.form';
        $this->lists = [
            'units' => UnitsEnum::getSelectList(),
            'vat_types' => VatTypesEnum::getSelectList(),
        ];

        if ($invoiceId) {
            $invoice = Invoice::find($invoiceId);
            $this->items = $invoice->items->toArray();
        } else {
            $this->items = [];
        }
    }

    public function render()
    {
        foreach ($this->items as $index => $item) {
            $netto = formatPriceEdit($item['quantity'] * $item['price']);
            $vat = formatPriceEdit(vatValue($netto, (int)$item['vat_type']));
            $brutto = formatPriceEdit($netto + $vat);

            $this->items[$index]['netto'] = $netto;
            $this->items[$index]['vat'] = $vat;
            $this->items[$index]['brutto'] = $brutto;
        }

        return parent::render();
    }

    public function addItem()
    {
        $this->items[] = array_fill_keys((new InvoiceItem())->getFillable(), null);
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }
}
