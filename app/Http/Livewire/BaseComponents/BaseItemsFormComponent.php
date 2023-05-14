<?php

namespace App\Http\Livewire\BaseComponents;

use Livewire\Component;

class BaseItemsFormComponent extends Component
{
    public $view_path;
    public $data;
    public $items;
    public $total;
    public $label;
    public $lists;
    public $col;
    public $onlyShow;

    public function render()
    {
        return view($this->view_path);
    }
}
