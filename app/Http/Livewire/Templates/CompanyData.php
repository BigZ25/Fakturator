<?php

namespace App\Http\Livewire\Templates;

use Livewire\Component;

class CompanyData extends Component
{
    public $prefix;
    public $entity;

    public function mount($prefix = null, $entity = null)
    {
        $this->prefix = $prefix;
        $this->entity = $entity;
    }

    public function render()
    {
        return view('templates.company_data.form',[
            'entity' => $this->entity,
        ]);
    }
}
