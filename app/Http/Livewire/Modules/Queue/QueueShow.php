<?php

namespace App\Http\Livewire\Modules\Queue;

use App\Http\Livewire\BaseComponents\BaseShowComponent;
use App\Models\Modules\Invoices\Advert;
use App\Models\Modules\Invoices\QueueOfAdvert;

class QueueShow extends BaseShowComponent
{
    public $category_tmp;
    public $deleteSingleModal;

    public function mount(int $entity_id)
    {
        $this->title = 'Podgląd pozycji z kolejki';
        $this->view_path = 'modules.queue.show';
        $this->currentModule = 'queue';
        $this->entity_id = $entity_id;
    }

    public function render()
    {
        $this->data = ['item' => QueueOfAdvert::find($this->entity_id)];

        return parent::render();
    }
}
