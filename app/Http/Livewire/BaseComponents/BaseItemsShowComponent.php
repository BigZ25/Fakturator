<?php

namespace App\Http\Livewire\BaseComponents;

use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{PowerGridComponent};

class BaseItemsShowComponent extends PowerGridComponent
{
    use ActionButton;

    protected $parentId;
    public $box_title;
}
