<?php

namespace App\Http\Livewire\Modules\Customers;

use App\Enum\Modules\Customers\CustomerCategoriesEnum;
use App\Enum\Modules\Customers\CustomerOperationsEnum;
use App\Http\Livewire\BaseComponents\BaseShowComponent;
use App\Models\Modules\Customers\Customer;
use App\Models\Modules\Customers\CustomerPhoto;
use App\Services\Modules\CustomersService;
use Illuminate\Support\Facades\Artisan;
use WireUi\Traits\Actions;

class CustomersShow extends BaseShowComponent
{
    use Actions;

    public $photoShowModalUrl;
    public $photoShowModal;
    public $category_tmp;
    public $deleteSingleModal;
    public $addToOlxSingleModal;

    public function mount(int $entity_id)
    {
        $this->title = 'Podgląd kolekcji';
        $this->view_path = 'modules.customers.show';
        $this->currentModule = 'customers';
        $this->entity_id = $entity_id;
//        $this->photoShowModal = false;
//        $this->deleteSingleModal = false;
//        $this->addToOlxSingleModal = false;
//        $this->category_tmp = CustomerCategoriesEnum::ANTIQUES_AND_COLLECTIONS_OTHER_COLLECTIONS;
    }

    public function render()
    {
        $this->data = ['customer' => Customer::find($this->entity_id)];

        return parent::render();
    }

    public function openPhotoShowModal(int $photoId)
    {
        $photo = CustomerPhoto::find($photoId);

        $this->photoShowModalUrl = route('customers.photos.show', [$photo->customer_id, $photo->id]);
        $this->photoShowModal = true;
    }

    public function addToOlx($id)
    {
        CustomersService::addToQueue($id, CustomerOperationsEnum::ADD_TO_OLX, ['category' => $this->category_tmp]);

        return redirect(request()->header('Referer'));
    }

    public function openDeleteSingleModal($customerId)
    {
        $this->deleteSingleModal = true;
    }

    public function openAddToOlxSingleModal($customerId)
    {
        $this->addToOlxSingleModal = true;
    }
}
