<?php

namespace App\Http\Livewire\Modules\Customers;

use App\Http\Livewire\BaseComponents\BaseShowComponent;
use App\Models\Modules\Customers\Customer;
use WireUi\Traits\Actions;

class CustomersShow extends BaseShowComponent
{
    use Actions;

    public function mount(int $entity_id)
    {
        $this->title = 'Podgląd klienta';
        $this->view_path = 'modules.customers.show';
        $this->currentModule = 'customers';
        $this->entity_id = $entity_id;
    }

    public function render()
    {
        $this->data = ['customer' => Customer::find($this->entity_id)];

        return parent::render();
    }
}
