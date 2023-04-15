<?php

namespace App\Http\Livewire\Modules\Collections\Items;

use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\Modules\Collections\CollectionItem;

class CollectionItemsIndex extends BaseIndexComponent
{
    public $item;
    public $deleteSingleModal;
    public $collection;

    public function mount($collection)
    {
        $this->view_path = 'modules.collections.items.index';
        $this->inject = true;
        $this->collection = $collection;
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
        $collectionItems = $this->searchForm(CollectionItem::query()->where('collection_id', $this->collection->id));

        $this->data = compact('collectionItems');

        return parent::render();
    }

    public function openDeleteSingleModal($collectionId)
    {
        $this->item = CollectionItem::find($collectionId);
        $this->deleteSingleModal = true;
    }
}
