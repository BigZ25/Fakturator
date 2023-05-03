<?php

namespace App\Http\Livewire\Modules\Invoices\Items;

use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Http\Livewire\Index;
use App\Models\Modules\Invoices\InvoiceItem;

class InvoiceItemsIndex extends Index
{
    public $item;
    public $deleteSingleModal;
    public $invoice;

    public function mount($invoice)
    {
        $this->view_path = 'modules.invoices.items.index';
        $this->inject = true;
        $this->invoice = $invoice;
//        $this->item = null;
//        $this->deleteSingleModal = false;
//        $this->addToOlxSingleModal = false;
//        $this->category_tmp = InvoiceCategoriesEnum::ANTIQUES_AND_COLLECTIONS_OTHER_COLLECTIONS;

//        $this->lists = [
//            'statuses' => InvoiceStatusesEnum::getSelectList(),
//            'olx_statuses' => InvoiceOlxStatusesEnum::getSelectList(),
//            'categories' => InvoiceCategoriesEnum::getSelectList(),
//        ];
//
//        $this->forms = [
//            'phrase' => ['field' => Invoice::searchField(), 'operator' => 'like', 'value' => null],
//            'status' => ['field' => 'status', 'operator' => '=', 'value' => null],
//            'olx_status' => ['field' => 'olx_status', 'operator' => '=', 'value' => null],
//        ];

        $this->original_forms = $this->forms;
    }

    public function render()
    {
        $invoiceItems = $this->searchForm(InvoiceItem::query()->where('invoice_id', $this->invoice->id));

        $this->data = compact('invoiceItems');

        return parent::render();
    }

    public function openDeleteSingleModal($invoiceId)
    {
        $this->item = InvoiceItem::find($invoiceId);
        $this->deleteSingleModal = true;
    }
}
