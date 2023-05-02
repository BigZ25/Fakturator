<?php

namespace App\Http\Livewire\Modules\Customers;

use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\Modules\Customers\Customer;

class CustomersIndex extends BaseIndexComponent
{
    public function mount()
    {
        $this->title = 'Lista klientów';
        $this->view_path = 'modules.customers.index';
        $this->currentModule = 'customers';

        $this->custom_forms = [
            'phrase' => ['query' => null, 'value' => null],
        ];
    }

    public function render()
    {
        $this->processCustomForms();

        $customers = $this->searchForm(Customer::query());

//        $i = 0;
//
//        foreach ($customers as $customer) {
//            $this->checkboxes[$i]['model'] = class_basename($customer);
//            $this->checkboxes[$i]['db_id'] = $customer->id;
//
//            $i++;
//        }

        $this->data = compact('customers');

        return parent::render();
    }

    private function processCustomForms()
    {
        if ($this->custom_forms['phrase']['value'] != null) {
            $this->custom_forms['phrase']['query'] = 'name LIKE "%' . $this->custom_forms['phrase']['value'] . '%" OR nip LIKE "%' . $this->custom_forms['phrase']['value'] . '%"';
        } else {
            $this->custom_forms['phrase']['query'] = null;
        }
    }
}
