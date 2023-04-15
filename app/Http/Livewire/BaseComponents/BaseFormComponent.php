<?php

namespace App\Http\Livewire\BaseComponents;

use App\Http\Livewire\Index;
use Livewire\Component;
use Livewire\WithPagination;

class BaseFormComponent extends Index
{
    public $view_path;
    public $data;
    public $entity_id;
    public $copy_id;
    public $title;
    public $lists;
    public $currentModule;

    public function render()
    {
        return parent::render();
    }
}
