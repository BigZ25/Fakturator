<?php

namespace App\Http\Livewire\Modules\Observations\Links;

use App\Enum\Modules\Observations\WebsitesEnum;
use App\Http\Livewire\BaseComponents\BaseItemsComponent;
use App\Models\Modules\Observations\Observation;
use App\Models\Modules\Observations\ObservationLink;

class ObservationLinksForm extends BaseItemsComponent
{
    public function mount($observationId)
    {
        $this->view_path = 'modules.observations.links.form';
        $this->lists = [
            'websites' => WebsitesEnum::getSelectList(),
        ];

        if($observationId)
        {
            $observation = Observation::find($observationId);
            $this->items = $observation->links->toArray();
        } else {
            $this->items = [];
        }
    }

    public function render()
    {
        return parent::render();
    }

    public function addItem()
    {
        $this->items[] = array_fill_keys((new ObservationLink())->getFillable(), null);
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }
}
