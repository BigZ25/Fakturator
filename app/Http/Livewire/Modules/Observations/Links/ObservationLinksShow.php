<?php

namespace App\Http\Livewire\Modules\Observations\Links;

use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\Modules\Observations\Observation;

class ObservationLinksShow extends BaseIndexComponent
{
    public $observationId;

    public function mount($observationId)
    {
        $this->view_path = 'modules.observations.links.show';
        $this->inject = true;
        $this->observationId = $observationId;
    }

    public function render()
    {
        $observation = Observation::find($this->observationId);
        $items = $this->searchForm($observation->links());

        $this->data = compact('items');

        return parent::render();
    }
}
