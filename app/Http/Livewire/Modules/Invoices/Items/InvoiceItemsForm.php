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
