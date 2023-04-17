<?php

namespace App\Http\Livewire\Modules\Queue;

use App\Enum\Modules\Invoices\InvoiceOperationsEnum;
use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\Modules\Invoices\QueueOfInvoice;

class QueueIndex extends BaseIndexComponent
{
    public $invoice_id;

    public function mount($invoice_id = null)
    {
        $this->title = 'Kolejka';
        $this->view_path = 'modules.queue.index';
        $this->currentModule = 'queue';
        $this->invoice_id = $invoice_id;

        if ($this->invoice_id) {
            $this->inject = true;
        }

        $this->lists = [
            'operation_types' => InvoiceOperationsEnum::getSelectList(),
            'success_types' => [['id' => 0, 'text' => 'Nie'], ['id' => 1, 'text' => 'Tak'], ['id' => 2, 'text' => '-']],
        ];

        $this->forms = [
            'phrase' => ['field' => QueueOfInvoice::searchField(), 'operator' => 'like', 'value' => null],
            'operation_type' => ['field' => 'operation', 'operator' => '=', 'value' => null],
        ];

        $this->custom_forms = [
            'success' => ['query' => null, 'value' => null],
        ];

        $this->original_forms = $this->forms;
    }

    public function render()
    {
        $this->processCustomForms();

        if ($this->invoice_id) {
            $items = $this->searchForm(QueueOfInvoice::query()->where('invoice_id', $this->invoice_id));
        } else {
            $items = $this->searchForm(QueueOfInvoice::query());
        }


        $i = 0;

        foreach ($items as $item) {
            $this->checkboxes[$i]['model'] = class_basename($item);
            $this->checkboxes[$i]['db_id'] = $item->id;

            $i++;
        }

        $this->data = compact('items');

        return parent::render();
    }

    private function processCustomForms()
    {
        if ($this->custom_forms['success']['value'] != null) {
            $value = intval($this->custom_forms['success']['value']);

            if ($value === 0) {
                $this->custom_forms['success']['query'] = '(response_code <> 200)';
            } elseif ($value === 1) {
                $this->custom_forms['success']['query'] = '(response_code = 200)';
            } else {
                $this->custom_forms['success']['query'] = '(response_code IS NULL)';
            }
        } else {
            $this->custom_forms['success']['query'] = null;
        }
    }
}
