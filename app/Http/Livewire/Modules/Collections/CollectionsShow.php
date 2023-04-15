<?php

namespace App\Http\Livewire\Modules\Collections;

use App\Enum\Modules\Collections\CollectionCategoriesEnum;
use App\Enum\Modules\Collections\CollectionOperationsEnum;
use App\Http\Livewire\BaseComponents\BaseShowComponent;
use App\Models\Modules\Collections\Collection;
use App\Models\Modules\Collections\CollectionPhoto;
use App\Services\Modules\CollectionsService;
use Illuminate\Support\Facades\Artisan;
use WireUi\Traits\Actions;

class CollectionsShow extends BaseShowComponent
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
        $this->view_path = 'modules.collections.show';
        $this->currentModule = 'collections';
        $this->entity_id = $entity_id;
//        $this->photoShowModal = false;
//        $this->deleteSingleModal = false;
//        $this->addToOlxSingleModal = false;
//        $this->category_tmp = CollectionCategoriesEnum::ANTIQUES_AND_COLLECTIONS_OTHER_COLLECTIONS;
    }

    public function render()
    {
        $this->data = ['collection' => Collection::find($this->entity_id)];

        return parent::render();
    }

    public function openPhotoShowModal(int $photoId)
    {
        $photo = CollectionPhoto::find($photoId);

        $this->photoShowModalUrl = route('collections.photos.show', [$photo->collection_id, $photo->id]);
        $this->photoShowModal = true;
    }

    public function addToOlx($id)
    {
        CollectionsService::addToQueue($id, CollectionOperationsEnum::ADD_TO_OLX, ['category' => $this->category_tmp]);

        return redirect(request()->header('Referer'));
    }

    public function openDeleteSingleModal($collectionId)
    {
        $this->deleteSingleModal = true;
    }

    public function openAddToOlxSingleModal($collectionId)
    {
        $this->addToOlxSingleModal = true;
    }
}
