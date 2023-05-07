<?php

namespace App\Http\Livewire\Modules\Invoices;

use App\Enum\App\PaymentMethodsEnum;
use App\Http\Livewire\BaseComponents\BaseFormComponent;
use App\Models\Modules\Invoices\Invoice;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InvoicesForm extends BaseFormComponent
{
    use  AuthorizesRequests;

    public $invoice;

    public function mount(int $entity_id = null)
    {
        $this->title = $entity_id ? 'Edycja faktury' : 'Nowa faktura';
        $this->view_path = 'modules.invoices.form';
        $this->currentModule = 'invoices';
        $this->entity_id = $entity_id;
        $this->lists = [
            'payment_methods' => PaymentMethodsEnum::getSelectList(),
        ];

        $this->invoice = new Invoice();
        $this->invoice->number = Invoice::nextNumber(auth()->user()->id);
        //TODO: $this->issue_date = todayDate();

        if ($this->entity_id !== null) {
            $this->invoice = Invoice::find($this->entity_id);
        }

//        $this->authorize('edit', $this->invoice);
    }

    public function render()
    {
        $this->data['invoice'] = $this->invoice;

        return parent::render();
    }
}
