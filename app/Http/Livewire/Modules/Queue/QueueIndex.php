<?php

namespace App\Http\Livewire\Modules\Queue;

use App\Enum\Modules\Adverts\AdvertOperationsEnum;
use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\Modules\Invoices\QueueOfAdvert;

class QueueIndex extends BaseIndexComponent
{
    public $advert_id;

    public function mount($advert_id = null)
    {
        $this->title = 'Kolejka';
        $this->view_path = 'modules.queue.index';
        $this->currentModule = 'queue';
        $this->advert_id = $advert_id;

        if ($this->advert_id) {
            $this->inject = true;
        }

        $this->lists = [
            'operation_types' => AdvertOperationsEnum::getSelectList(),
            'success_types' => [['id' => 0, 'text' => 'Nie'], ['id' => 1, 'text' => 'Tak'], ['id' => 2, 'text' => '-']],
        ];

        $this->forms = [
            'phrase' => ['field' => QueueOfAdvert::searchField(), 'operator' => 'like', 'value' => null],
            'operation_type' => ['field' => 'operation', 'operator' => '=', 'value' => null],
        ];

        $this->custom_forms = [
            'success' => ['query' => null, 'value' => null],
        ];

        $this->original_forms = $this->forms;
    }

    public function render()
    {
        $this->processCustomForms();

        if ($this->advert_id) {
            $items = $this->searchForm(QueueOfAdvert::query()->where('advert_id', $this->advert_id));
        } else {
            $items = $this->searchForm(QueueOfAdvert::query());
        }


        $i = 0;

        foreach ($items as $item) {
            $this->checkboxes[$i]['model'] = class_basename($item);
            $this->checkboxes[$i]['db_id'] = $item->id;

            $i++;
        }

        $this->data = compact('items');

        return parent::render();
    }

    private function processCustomForms()
    {
        if ($this->custom_forms['success']['value'] != null) {
            $value = intval($this->custom_forms['success']['value']);

            if ($value === 0) {
                $this->custom_forms['success']['query'] = '(response_code <> 200)';
            } elseif ($value === 1) {
                $this->custom_forms['success']['query'] = '(response_code = 200)';
            } else {
                $this->custom_forms['success']['query'] = '(response_code IS NULL)';
            }
        } else {
            $this->custom_forms['success']['query'] = null;
        }
    }
}
