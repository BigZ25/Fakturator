<?php

namespace App\Http\Livewire\Modules\Invoices;

use App\Http\Livewire\BaseComponents\BaseShowComponent;
use App\Models\Modules\Invoices\Invoice;

class InvoicesShow extends BaseShowComponent
{
    public function mount(int $entity_id)
    {
        $this->title = 'Podgląd faktury';
        $this->view_path = 'modules.invoices.show';
        $this->currentModule = 'invoices';
        $this->entity_id = $entity_id;
    }

    public function render()
    {
        $this->data = ['invoice' => Invoice::find($this->entity_id)];

        return parent::render();
    }
}
