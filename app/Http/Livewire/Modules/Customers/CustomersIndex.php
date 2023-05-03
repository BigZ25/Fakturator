<?php

namespace App\Http\Livewire\Modules\Customers;

use App\Http\Livewire\BaseComponents\BaseIndexComponent;

class CustomersIndex extends BaseIndexComponent
{
    public function mount()
    {
        $this->title = 'Lista klientów';
        $this->view_path = 'modules.customers.index';
        $this->currentModule = 'customers';
        $this->data = [];
    }

    public function render()
    {
        return parent::render();
    }
}
