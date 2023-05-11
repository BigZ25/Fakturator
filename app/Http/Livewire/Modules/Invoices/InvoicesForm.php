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

        if ($this->entity_id !== null) {
            $this->invoice = Invoice::find($this->entity_id);
        } else {
            $this->invoice = new Invoice();
            $this->invoice->number = Invoice::nextNumber(auth()->user()->id);
            $this->invoice->issue_date = todayDate();
            $this->invoice->sale_date = date("Y-m-d", strtotime("+1 month", strtotime(todayDate())));
            $this->invoice->payment_date = todayDate();
        }
    }

    public function render()
    {
        $this->data['invoice'] = $this->invoice;

        return parent::render();
    }
}
