<?php

namespace App\Http\Livewire\Modules\Collections;

use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\Modules\Collections\Collection;

class CollectionsIndex extends BaseIndexComponent
{
    public $item;
    public $deleteSingleModal;

    public function mount()
    {
        $this->title = 'Lista kolekcji';
        $this->view_path = 'modules.collections.index';
        $this->currentModule = 'collections';
//        $this->item = null;
//        $this->deleteSingleModal = false;
//        $this->addToOlxSingleModal = false;
//        $this->category_tmp = CollectionCategoriesEnum::ANTIQUES_AND_COLLECTIONS_OTHER_COLLECTIONS;

//        $this->lists = [
//            'statuses' => CollectionStatusesEnum::getSelectList(),
//            'olx_statuses' => CollectionOlxStatusesEnum::getSelectList(),
//            'categories' => CollectionCategoriesEnum::getSelectList(),
//        ];
//
//        $this->forms = [
//            'phrase' => ['field' => Collection::searchField(), 'operator' => 'like', 'value' => null],
//            'status' => ['field' => 'status', 'operator' => '=', 'value' => null],
//            'olx_status' => ['field' => 'olx_status', 'operator' => '=', 'value' => null],
//        ];

        $this->original_forms = $this->forms;
    }

    public function render()
    {
        $collections = $this->searchForm(Collection::query());

        $i = 0;

        foreach ($collections as $collection) {
            $this->checkboxes[$i]['model'] = class_basename($collection);
            $this->checkboxes[$i]['db_id'] = $collection->id;

            $i++;
        }

        $this->data = compact('collections');

        return parent::render();
    }

    public function openDeleteSingleModal($collectionId)
    {
        $this->item = Collection::find($collectionId);
        $this->deleteSingleModal = true;
    }
}
