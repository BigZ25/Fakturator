<?php

namespace App\Http\Livewire\Modules\Collections\Items;

use App\Http\Livewire\BaseComponents\BaseShowComponent;
use App\Models\Modules\Collections\CollectionItem;
use App\Models\Modules\Collections\CollectionItemPhoto;
use WireUi\Traits\Actions;

class CollectionItemsShow extends BaseShowComponent
{
    use Actions;

    public $photoShowModalUrl;
    public $photoShowModal;
    public $deleteSingleModal;
    public $collectionItem;

    public function mount(int $collection_id, int $entity_id)
    {
        $this->title = 'Podgląd przedmiotu w kolekcji';
        $this->view_path = 'modules.collections.items.show';
        $this->currentModule = 'collections';

        $this->collectionItem = CollectionItem::query()
            ->where('collection_id', $collection_id)
            ->where('id', $entity_id)
            ->first();

        $this->deleteSingleModal = false;

        $this->photoShowModal = false;
    }

    public function render()
    {
        $this->data = ['collectionItem' => $this->collectionItem];

        return parent::render();
    }

    public function openPhotoShowModal(int $photoId)
    {
        $photo = CollectionItemPhoto::find($photoId);

        $this->photoShowModalUrl = route('collections.items.photos.show', [$photo->collectionItem->collection_id, $photo->collection_item_id, $photo->id]);
        $this->photoShowModal = true;
    }

    public function openDeleteSingleModal($collectionId)
    {
        $this->deleteSingleModal = true;
    }

}
