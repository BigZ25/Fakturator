<?php

namespace App\Http\Livewire\Modules\Invoices;

use App\Http\Livewire\BaseComponents\BaseShowComponent;
use App\Models\Modules\Invoices\Invoice;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InvoicesShow extends BaseShowComponent
{
    use  AuthorizesRequests;

    public $invoice;

    public function mount(int $entity_id)
    {
        $this->title = 'Podgląd faktury';
        $this->view_path = 'modules.invoices.show';
        $this->currentModule = 'invoices';
        $this->breadcrumbs = [
            'label' => 'Powrót do listy faktur',
            'route' => route('invoices.index')
        ];
        $this->entity_id = $entity_id;
        $this->invoice = Invoice::find($this->entity_id);

        $this->authorize('isInvoiceUser', $this->invoice);
    }

    public function render()
    {
        $this->data = ['invoice' => $this->invoice];

        return parent::render();
    }
}
