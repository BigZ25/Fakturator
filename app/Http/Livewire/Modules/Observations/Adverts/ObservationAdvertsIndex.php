<?php

namespace App\Http\Livewire\Modules\Observations\Adverts;

use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\Modules\Observations\Observation;
use App\Models\Modules\Observations\ObservationAdvert;

class ObservationAdvertsIndex extends BaseIndexComponent
{
    public $observationId;

    public function mount($observationId = null)
    {
        $this->view_path = 'modules.observations.adverts.index';
        $this->inject = true;
        $this->observationId = $observationId;
    }

    public function render()
    {
        $observation = Observation::find($this->observationId);

        if ($observation) {
            $adverts = $this->searchForm($observation->adverts());
        } else {
            $adverts = $this->searchForm(ObservationAdvert::query());
        }

        $this->data = compact('adverts');

        return parent::render();
    }
}
