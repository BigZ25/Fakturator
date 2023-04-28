<?php

namespace App\Http\Livewire\Modules\Products;

use App\Http\Livewire\BaseComponents\BaseFormComponent;
use App\Models\Modules\Products\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductsForm extends BaseFormComponent
{
    use  AuthorizesRequests;

    public $product;

    public function mount(int $entity_id = null)
    {
        $this->title = $entity_id ? 'Edycja produktu' : 'Nowy produkt';
        $this->view_path = 'modules.products.form';
        $this->currentModule = 'products';
        $this->entity_id = $entity_id;
        $this->product = new Product();

        if ($this->entity_id !== null) {
            $this->product = Product::find($this->entity_id);
        }
    }

    public function render()
    {
        $this->data['product'] = $this->product;

        return parent::render();
    }
}
