<?php

namespace App\Http\Livewire\Modules\Invoices;

use App\Http\Livewire\BaseComponents\BaseFormComponent;
use App\Models\Modules\Invoices\Invoice;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InvoicesForm extends BaseFormComponent
{
    use  AuthorizesRequests;

    public $invoice;
    public $import;
    public $deleteSingleModal;

    public function mount(int $entity_id = null)
    {
        $this->title = 'Nowe ogłoszenie';
        $this->view_path = 'modules.invoices.form';
        $this->currentModule = 'invoices';
        $this->entity_id = $entity_id;
        $this->deleteSingleModal = false;
        $this->import = 0;
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
//        if ($this->entity_id !== null) {
//            $this->data = ['invoice' => Invoice::find($this->entity_id)];
//        }

        $this->data['invoice'] = $this->invoice;

        return parent::render();
    }

    public function openDeleteSingleModal($invoiceId)
    {
        $this->deleteSingleModal = true;
    }
}
