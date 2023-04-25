<?php

namespace App\Http\Livewire\Modules\Products;

use App\Enum\Modules\Products\ProductCategoriesEnum;
use App\Enum\Modules\Products\ProductOperationsEnum;
use App\Http\Livewire\BaseComponents\BaseShowComponent;
use App\Models\Modules\Products\Product;
use App\Models\Modules\Products\ProductPhoto;
use App\Services\Modules\ProductsService;
use Illuminate\Support\Facades\Artisan;
use WireUi\Traits\Actions;

class ProductsShow extends BaseShowComponent
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
        $this->view_path = 'modules.products.show';
        $this->currentModule = 'products';
        $this->entity_id = $entity_id;
//        $this->photoShowModal = false;
//        $this->deleteSingleModal = false;
//        $this->addToOlxSingleModal = false;
//        $this->category_tmp = ProductCategoriesEnum::ANTIQUES_AND_COLLECTIONS_OTHER_COLLECTIONS;
    }

    public function render()
    {
        $this->data = ['product' => Product::find($this->entity_id)];

        return parent::render();
    }

    public function openPhotoShowModal(int $photoId)
    {
        $photo = ProductPhoto::find($photoId);

        $this->photoShowModalUrl = route('products.photos.show', [$photo->product_id, $photo->id]);
        $this->photoShowModal = true;
    }

    public function addToOlx($id)
    {
        ProductsService::addToQueue($id, ProductOperationsEnum::ADD_TO_OLX, ['category' => $this->category_tmp]);

        return redirect(request()->header('Referer'));
    }

    public function openDeleteSingleModal($productId)
    {
        $this->deleteSingleModal = true;
    }

    public function openAddToOlxSingleModal($productId)
    {
        $this->addToOlxSingleModal = true;
    }
}
