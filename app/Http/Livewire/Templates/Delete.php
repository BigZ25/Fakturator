<?php

namespace App\Http\Livewire\Templates;

use Livewire\Component;

class Delete extends Component
{
    public $entity;
    public $deleteModal;

    protected $listeners = [
        'openDeleteModal' => 'openDeleteModal'
    ];

    public function mount($entity = null)
    {
        $this->deleteModal = false;
        $this->entity = $entity;
    }

    public function render()
    {
        return view('templates.delete');
    }

    public function openDeleteModal($data)
    {
        $class = $data['class'];
        $id = $data['id'];
        $entity = (new $class())->find($id);

        if ($entity) {
            $this->entity = $entity;
            $this->deleteModal = true;
        }
    }
}
