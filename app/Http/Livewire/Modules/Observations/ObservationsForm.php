<?php

namespace App\Http\Livewire\Modules\Observations;

use App\Http\Livewire\BaseComponents\BaseFormComponent;
use App\Models\Modules\Observations\Observation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ObservationsForm extends BaseFormComponent
{
    use  AuthorizesRequests;

    public $observation;
    public $import;
    public $deleteSingleModal;

    public function mount(int $entity_id = null)
    {
        $this->title = 'Nowa obserwacja';
        $this->view_path = 'modules.observations.form';
        $this->currentModule = 'observations';
        $this->entity_id = $entity_id;
        $this->deleteSingleModal = false;
        $this->import = 0;
        $this->observation = new Observation();

        $observation = new Observation();

        if ($this->entity_id !== null) {
            $this->observation = Observation::find($this->entity_id);
        }

//        $this->authorize('edit', $this->observation);

        if (request()->has('copy') && $entity_id === null) {
            $this->observation = Observation::find(request()->input('copy'));
            $this->observation->id = null;
        }

        $this->data = compact('observation');
    }

    public function render()
    {
        $this->data['observation'] = $this->observation;

        return parent::render();
    }

    public function openDeleteSingleModal($observationId)
    {
        $this->deleteSingleModal = true;
    }
}
