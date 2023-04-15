<?php

namespace App\Http\Livewire\Modules\Observations;

use App\Http\Livewire\BaseComponents\BaseShowComponent;
use App\Models\Modules\Observations\Observation;

class ObservationsShow extends BaseShowComponent
{
    public $deleteSingleModal;

    public function mount(int $entity_id)
    {
        $this->title = 'Podgląd obserwacji';
        $this->view_path = 'modules.observations.show';
        $this->currentModule = 'observations';
        $this->entity_id = $entity_id;
        $this->photoShowModal = false;
        $this->deleteSingleModal = false;
        $this->addToOlxSingleModal = false;
    }

    public function render()
    {
        $this->data = ['observation' => Observation::find($this->entity_id)];

        return parent::render();
    }

//    public function openDeleteSingleModal($observationId)
//    {
//        $this->deleteSingleModal = true;
//    }
}
