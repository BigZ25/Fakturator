<?php

namespace App\Http\Livewire\Modules\Adverts;

use App\Http\Livewire\BaseComponents\BaseFormComponent;
use App\Models\Modules\Adverts\Advert;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdvertsForm extends BaseFormComponent
{
    use  AuthorizesRequests;

    public $advert;
    public $import;
    public $deleteSingleModal;

    public function mount(int $entity_id = null)
    {
        $this->title = 'Nowe ogłoszenie';
        $this->view_path = 'modules.adverts.form';
        $this->currentModule = 'adverts';
        $this->entity_id = $entity_id;
        $this->deleteSingleModal = false;
        $this->import = 0;
        $this->advert = new Advert();

        $advert = new Advert();

        if ($this->entity_id !== null) {
            $this->advert = Advert::find($this->entity_id);
        }

        $this->authorize('edit', $this->advert);

        if (request()->has('import') && $this->entity_id === null) {
            $this->import = 1;
        } elseif (request()->has('copy') && $entity_id === null) {
            $advert = Advert::find(request()->input('copy'));
            $advert->id = null;
        }

        $this->data = compact('advert');
    }

    public function render()
    {
//        if ($this->entity_id !== null) {
//            $this->data = ['advert' => Advert::find($this->entity_id)];
//        }

        $this->data['advert'] = $this->advert;

        return parent::render();
    }

    public function openDeleteSingleModal($advertId)
    {
        $this->deleteSingleModal = true;
    }
}
