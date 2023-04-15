<?php

namespace App\Http\Livewire\Modules\Observations;

use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\Modules\Observations\Observation;

class ObservationsIndex extends BaseIndexComponent
{
    public $deleteSingleModal;
    public $item;

    public function mount()
    {
        $this->title = 'Lista obserwacji';
        $this->view_path = 'modules.observations.index';
        $this->currentModule = 'observations';
        $this->deleteSingleModal = false;
    }

    public function render()
    {
        $observations = $this->searchForm(Observation::query());

        $this->data = compact('observations');

        return parent::render();
    }

    public function openDeleteSingleModal($observationId)
    {
        $this->item = Observation::find($observationId);
        $this->deleteSingleModal = true;
    }

    public function changeNotificationsSettings($observationId, $type)
    {
        $observation = Observation::find($observationId);

        if ($observation) {
            switch ($type) {
                case 0:
                    $observation->update(['email_notification' => !$observation->email_notification]);
                    break;
                case 1:
                    $observation->update(['phone_notification' => !$observation->phone_notification]);
                    break;
                case 2:
                    $observation->update(['browser_notification' => !$observation->browser_notification]);
                    break;
                case 3:
                    $observation->update(['pushover_notification' => !$observation->pushover_notification]);
                    break;
            }
        }
    }
}
