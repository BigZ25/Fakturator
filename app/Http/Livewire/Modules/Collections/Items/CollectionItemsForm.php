<?php

namespace App\Http\Livewire\Modules\Collections\Items;

use App\Http\Livewire\BaseComponents\BaseFormComponent;
use App\Models\Modules\Collections\Collection;
use App\Models\Modules\Collections\CollectionItem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CollectionItemsForm extends BaseFormComponent
{
    use  AuthorizesRequests;

    public $collectionItem;
    public $deleteSingleModal;
    public $collection_id;

    public function mount(int $collection_id, int $entity_id = null)
    {
        $this->title = 'Nowa przedmiot w kolekcji';
        $this->view_path = 'modules.collections.items.form';
        $this->currentModule = 'collections';
        $this->entity_id = $entity_id;
        $this->collection_id = $collection_id;

//        $this->deleteSingleModal = false;
        $this->collectionItem = new CollectionItem();

        if ($this->entity_id !== null) {
            $this->collectionItem = CollectionItem::find($this->entity_id);
        }
//        $this->authorize('edit', $this->collection);
    }

    public function render()
    {
//        if ($this->entity_id !== null) {
//            $this->data = ['collection' => Collection::find($this->entity_id)];
//        }

        $this->data['collectionItem'] = $this->collectionItem;

        return parent::render();
    }

    public function openDeleteSingleModal($collectionId)
    {
        $this->deleteSingleModal = true;
    }
}
