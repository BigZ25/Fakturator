<?php

namespace App\Http\Livewire\Modules\Inoices\Items;

use App\Http\Livewire\BaseComponents\BaseShowComponent;
use App\Models\Modules\Invoices\InvoiceItem;
use App\Models\Modules\Invoices\InvoiceItemPhoto;
use WireUi\Traits\Actions;

class InvoiceItemsShow extends BaseShowComponent
{
    use Actions;

    public $photoShowModalUrl;
    public $photoShowModal;
    public $deleteSingleModal;
    public $invoiceItem;

    public function mount(int $invoice_id, int $entity_id)
    {
        $this->title = 'Podgląd przedmiotu w kolekcji';
        $this->view_path = 'modules.invoices.items.show';
        $this->currentModule = 'invoices';

        $this->invoiceItem = InvoiceItem::query()
            ->where('invoice_id', $invoice_id)
            ->where('id', $entity_id)
            ->first();

        $this->deleteSingleModal = false;

        $this->photoShowModal = false;
    }

    public function render()
    {
        $this->data = ['invoiceItem' => $this->invoiceItem];

        return parent::render();
    }

    public function openPhotoShowModal(int $photoId)
    {
        $photo = InvoiceItemPhoto::find($photoId);

        $this->photoShowModalUrl = route('invoices.items.photos.show', [$photo->invoiceItem->invoice_id, $photo->invoice_item_id, $photo->id]);
        $this->photoShowModal = true;
    }

    public function openDeleteSingleModal($invoiceId)
    {
        $this->deleteSingleModal = true;
    }

}
