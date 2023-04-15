<?php

namespace App\Http\Livewire\Modules\Invoices;

use App\Enum\Modules\Invoices\InvoiceCategoriesEnum;
use App\Enum\Modules\Invoices\InvoiceOperationsEnum;
use App\Http\Livewire\BaseComponents\BaseShowComponent;
use App\Models\Modules\Invoices\Invoice;
use App\Models\Modules\Invoices\InvoicePhoto;
use App\Services\Modules\InvoicesService;
use Illuminate\Support\Facades\Artisan;
use WireUi\Traits\Actions;

class InvoicesShow extends BaseShowComponent
{
    use Actions;

    public $photoShowModalUrl;
    public $photoShowModal;
    public $category_tmp;
    public $deleteSingleModal;
    public $addToOlxSingleModal;

    public function mount(int $entity_id)
    {
        $this->title = 'Podgląd ogłoszenia';
        $this->view_path = 'modules.invoices.show';
        $this->currentModule = 'invoices';
        $this->entity_id = $entity_id;
        $this->photoShowModal = false;
        $this->deleteSingleModal = false;
        $this->addToOlxSingleModal = false;
        $this->category_tmp = InvoiceCategoriesEnum::ANTIQUES_AND_COLLECTIONS_OTHER_COLLECTIONS;

        Artisan::call('invoices:update_olx_status', [
            'id' => $entity_id,
        ]);
    }

    public function render()
    {
        $this->data = ['invoice' => Invoice::find($this->entity_id)];

        return parent::render();
    }

    public function openPhotoShowModal(int $photoId)
    {
        $photo = InvoicePhoto::find($photoId);

        $this->photoShowModalUrl = route('invoices.photos.show', [$photo->invoice_id, $photo->id]);
        $this->photoShowModal = true;
    }

    public function addToOlx($id)
    {
        InvoicesService::addToQueue($id, InvoiceOperationsEnum::ADD_TO_OLX, ['category' => $this->category_tmp]);

        return redirect(request()->header('Referer'));
    }

    public function openDeleteSingleModal($invoiceId)
    {
        $this->deleteSingleModal = true;
    }

    public function openAddToOlxSingleModal($invoiceId)
    {
        $this->addToOlxSingleModal = true;
    }
}
