<?php

namespace App\Http\Livewire\Modules\Collections;

use App\Http\Livewire\BaseComponents\BaseFormComponent;
use App\Models\Modules\Collections\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CollectionsForm extends BaseFormComponent
{
    use  AuthorizesRequests;

    public $collection;
    public $deleteSingleModal;

    public function mount(int $entity_id = null)
    {
        $this->title = 'Nowa kolekcja';
        $this->view_path = 'modules.collections.form';
        $this->currentModule = 'collections';
        $this->entity_id = $entity_id;
        $this->deleteSingleModal = false;
        $this->collection = new Collection();

        if ($this->entity_id !== null) {
            $this->collection = Collection::find($this->entity_id);
        }

//        $this->authorize('edit', $this->collection);
    }

    public function render()
    {
//        if ($this->entity_id !== null) {
//            $this->data = ['collection' => Collection::find($this->entity_id)];
//        }

        $this->data['collection'] = $this->collection;

        return parent::render();
    }

    public function openDeleteSingleModal($collectionId)
    {
        $this->deleteSingleModal = true;
    }
}
