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
        $this->title = 'Nowa faktura';
        $this->view_path = 'modules.invoices.form';
        $this->currentModule = 'invoices';
        $this->entity_id = $entity_id;
        $this->lists = [
            'payment_methods' => PaymentMethodsEnum::getSelectList(),
        ];
        $this->deleteSingleModal = false;
        $this->invoice = new Invoice();

        $invoice = new Invoice();

        if ($this->entity_id !== null) {
            $this->invoice = Invoice::find($this->entity_id);
        }

        $this->authorize('edit', $this->invoice);

        if (request()->has('import') && $this->entity_id === null) {
            $this->import = 1;
        } elseif (request()->has('copy') && $entity_id === null) {
            $invoice = Invoice::find(request()->input('copy'));
            $invoice->id = null;
        }

        $this->data = compact('invoice');
    }

    public function render()
    {
        $this->data['invoice'] = $this->invoice;

        return parent::render();
    }
}
