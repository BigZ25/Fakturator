<?php

namespace App\Http\Livewire\BaseComponents;

use App\Http\Livewire\Index;
use Livewire\Component;
use Livewire\WithPagination;

class BaseShowComponent extends Index
{
    public $view_path;
    public $entity_id;
    public $title;

    public function render()
    {
        return parent::render();
    }
}
