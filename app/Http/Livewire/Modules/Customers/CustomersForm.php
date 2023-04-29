<?php

namespace App\Http\Livewire\Modules\Customers;

use App\Http\Livewire\BaseComponents\BaseFormComponent;
use App\Models\Modules\Customers\Customer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CustomersForm extends BaseFormComponent
{
    use  AuthorizesRequests;

    public $customer;

    public function mount(int $entity_id = null)
    {
        $this->title = $entity_id ? 'Edycja klienta' : 'Nowy klient';
        $this->view_path = 'modules.customers.form';
        $this->currentModule = 'customers';
        $this->entity_id = $entity_id;
        $this->customer = new Customer();

        if ($this->entity_id !== null) {
            $this->customer = Customer::find($this->entity_id);
        }
    }

    public function render()
    {
        $this->data['customer'] = $this->customer;

        return parent::render();
    }
}
