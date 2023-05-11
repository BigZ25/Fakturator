<?php

namespace App\Http\Livewire\Modules\Products;

use App\Http\Livewire\BaseComponents\BaseShowComponent;
use App\Models\Modules\Products\Product;

class ProductsShow extends BaseShowComponent
{
    public function mount(int $entity_id)
    {
        $this->title = 'Podgląd kolekcji';
        $this->view_path = 'modules.products.show';
        $this->currentModule = 'products';
        $this->breadcrumbs = [
            'label' => 'Powrót do listy produktów',
            'route' => route('products.index')
        ];
        $this->entity_id = $entity_id;
    }

    public function render()
    {
        $this->data = ['product' => Product::find($this->entity_id)];

        return parent::render();
    }
}
