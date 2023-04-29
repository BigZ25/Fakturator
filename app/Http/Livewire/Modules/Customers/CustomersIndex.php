<?php

namespace App\Http\Livewire\Modules\Customers;

use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\Modules\Customers\Customer;

class CustomersIndex extends BaseIndexComponent
{
    public $item;
    public $deleteSingleModal;

    public function mount()
    {
        $this->title = 'Lista produktów';
        $this->view_path = 'modules.customers.index';
        $this->currentModule = 'customers';
//        $this->item = null;
//        $this->deleteSingleModal = false;
//        $this->addToOlxSingleModal = false;
//        $this->category_tmp = CustomerCategoriesEnum::ANTIQUES_AND_COLLECTIONS_OTHER_COLLECTIONS;

//        $this->lists = [
//            'statuses' => CustomerStatusesEnum::getSelectList(),
//            'olx_statuses' => CustomerOlxStatusesEnum::getSelectList(),
//            'categories' => CustomerCategoriesEnum::getSelectList(),
//        ];
//
//        $this->forms = [
//            'phrase' => ['field' => Customer::searchField(), 'operator' => 'like', 'value' => null],
//            'status' => ['field' => 'status', 'operator' => '=', 'value' => null],
//            'olx_status' => ['field' => 'olx_status', 'operator' => '=', 'value' => null],
//        ];

        $this->original_forms = $this->forms;
    }

    public function render()
    {
        $customers = $this->searchForm(Customer::query());

        $i = 0;

        foreach ($customers as $customer) {
            $this->checkboxes[$i]['model'] = class_basename($customer);
            $this->checkboxes[$i]['db_id'] = $customer->id;

            $i++;
        }

        $this->data = compact('customers');

        return parent::render();
    }
}
