<?php

namespace App\Http\Livewire\Modules\Products;

use App\Http\Livewire\BaseComponents\BaseShowComponent;
use App\Models\Modules\Products\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductsShow extends BaseShowComponent
{
    use  AuthorizesRequests;

    public $product;

    public function mount(int $entity_id)
    {
        $this->title = 'Podgląd produktu';
        $this->view_path = 'modules.products.show';
        $this->currentModule = 'products';
        $this->breadcrumbs = [
            'label' => 'Powrót do listy produktów',
            'route' => route('products.index')
        ];
        $this->entity_id = $entity_id;
        $this->product = Product::find($this->entity_id);

        $this->authorize('isProductUser', $this->product);
    }

    public function render()
    {
        $this->data = ['product' => $this->product];

        return parent::render();
    }
}
