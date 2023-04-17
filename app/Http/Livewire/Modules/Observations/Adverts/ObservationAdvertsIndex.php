<?php

namespace App\Http\Livewire\Modules\Observations\Invoices;

use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\Modules\Observations\Observation;
use App\Models\Modules\Observations\ObservationInvoice;

class ObservationInvoicesIndex extends BaseIndexComponent
{
    public $observationId;

    public function mount($observationId = null)
    {
        $this->view_path = 'modules.observations.invoices.index';
        $this->inject = true;
        $this->observationId = $observationId;
    }

    public function render()
    {
        $observation = Observation::find($this->observationId);

        if ($observation) {
            $invoices = $this->searchForm($observation->invoices());
        } else {
            $invoices = $this->searchForm(ObservationInvoice::query());
        }

        $this->data = compact('invoices');

        return parent::render();
    }
}
