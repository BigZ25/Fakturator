<?php

namespace App\Http\Livewire\Modules\Adverts;

use App\Enum\Modules\Adverts\AdvertCategoriesEnum;
use App\Enum\Modules\Adverts\AdvertStatusesEnum;
use App\Enum\OlxApi\AdvertOlxStatusesEnum;
use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\Modules\Adverts\Advert;

class AdvertsIndex extends BaseIndexComponent
{
    public $item;
    public $deleteSingleModal;
    public $addToOlxSingleModal;
    public $category_tmp;

    public function mount()
    {
        $this->title = 'Lista ogłoszeń';
        $this->view_path = 'modules.adverts.index';
        $this->currentModule = 'adverts';
        $this->item = null;
        $this->deleteSingleModal = false;
        $this->addToOlxSingleModal = false;
        $this->category_tmp = AdvertCategoriesEnum::ANTIQUES_AND_COLLECTIONS_OTHER_COLLECTIONS;

        $this->lists = [
            'statuses' => AdvertStatusesEnum::getSelectList(),
            'olx_statuses' => AdvertOlxStatusesEnum::getSelectList(),
            'categories' => AdvertCategoriesEnum::getSelectList(),
        ];

        $this->forms = [
            'phrase' => ['field' => Advert::searchField(), 'operator' => 'like', 'value' => null],
            'status' => ['field' => 'status', 'operator' => '=', 'value' => null],
            'olx_status' => ['field' => 'olx_status', 'operator' => '=', 'value' => null],
        ];

        $this->original_forms = $this->forms;
    }

    public function render()
    {
        $adverts = $this->searchForm(Advert::query());

        $i = 0;

        foreach ($adverts as $advert) {
            $this->checkboxes[$i]['model'] = class_basename($advert);
            $this->checkboxes[$i]['db_id'] = $advert->id;

            $i++;
        }

        $this->data = compact('adverts');

        return parent::render();
    }

    public function openDeleteSingleModal($advertId)
    {
        $this->item = Advert::find($advertId);
        $this->deleteSingleModal = true;
    }

    public function openAddToOlxSingleModal($advertId)
    {
        $this->item = Advert::find($advertId);
        $this->addToOlxSingleModal = true;
    }

    protected function customSort(): string
    {
        if ($this->sorting_col === 'full_name_with_item_number') {
            return "(SELECT CONCAT(IF(production_number IS NULL,CONCAT('Funko Pop ',production,' ',name),CONCAT('Funko Pop ',production,' ',production_number,' ',name)),' #',item_number) FROM adverts adv WHERE adv.id=adverts.id) " . $this->sorting_direction;
            //return $this->full_name . ' #' . $this->item_number;
//            if ($this->production_number === null) {
//                return 'Funko Pop ' . $this->production . ' ' . $this->name;
//            }
//
//            return 'Funko Pop ' . $this->production . ' ' . $this->production_number . ' ' . $this->name;
        }

        return parent::customSort();
    }
}
