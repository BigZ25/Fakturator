<?php

namespace App\Http\Livewire\Modules\Customers;

use App\Http\Livewire\BaseComponents\BaseShowComponent;
use App\Models\Modules\Customers\Customer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CustomersShow extends BaseShowComponent
{
    use  AuthorizesRequests;

    public $customer;

    public function mount(int $entity_id)
    {
        $this->title = 'Podgląd klienta';
        $this->view_path = 'modules.customers.show';
        $this->currentModule = 'customers';
        $this->breadcrumbs = [
            'label' => 'Powrót do listy klientów',
            'route' => route('customers.index')
        ];
        $this->entity_id = $entity_id;
        $this->customer = Customer::find($this->entity_id);

        $this->authorize('isCustomerUser', $this->customer);
    }

    public function render()
    {
        $this->data = ['customer' => $this->customer];

        return parent::render();
    }
}
