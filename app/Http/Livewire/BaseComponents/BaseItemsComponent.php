<?php

namespace App\Http\Livewire\BaseComponents;

use Livewire\Component;

class BaseItemsComponent extends Component
{
    public $view_path;
    public $data;
    public $items;
    public $total;
    public $box_title;
    public $lists;
    public $col;

    public function render()
    {
        return view($this->view_path);
    }
}
