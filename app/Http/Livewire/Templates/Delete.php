<?php

namespace App\Http\Livewire\Templates;

use App\Models\BaseModel;
use Illuminate\Support\Collection;
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
        $ids = $data['ids'];

        if (is_array($ids)) {
            if (!empty($ids)) {
                $deletion = new Collection();
                $deletion->title = "Usuwanie zaznaczonych pozycji";
                $deletion->content = "Czy napewno chcesz usunąć zaznaczone pozycje?";
                $deletion->route = route($class::destroyRoute(), 0);
                $deletion->ids = $ids;

                $this->entity = new BaseModel();
                $this->entity->deletion = $deletion;

                $this->deleteModal = true;
            }
        } else {
            $entity = (new $class())->find($ids);
            if ($entity) {
                $this->entity = $entity;
                $this->deleteModal = true;
            }
        }
    }
}
