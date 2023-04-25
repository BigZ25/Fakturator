<?php

namespace App\Http\Livewire\Modules\Products;

use App\Http\Livewire\BaseComponents\BaseFormComponent;
use App\Models\Modules\Products\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductsForm extends BaseFormComponent
{
    use  AuthorizesRequests;

    public $product;
    public $deleteSingleModal;

    public function mount(int $entity_id = null)
    {
        $this->title = 'Nowa kolekcja';
        $this->view_path = 'modules.products.form';
        $this->currentModule = 'products';
        $this->entity_id = $entity_id;
        $this->deleteSingleModal = false;
        $this->product = new Product();

        if ($this->entity_id !== null) {
            $this->product = Product::find($this->entity_id);
        }

//        $this->authorize('edit', $this->product);
    }

    public function render()
    {
//        if ($this->entity_id !== null) {
//            $this->data = ['product' => Product::find($this->entity_id)];
//        }

        $this->data['product'] = $this->product;

        return parent::render();
    }

    public function openDeleteSingleModal($productId)
    {
        $this->deleteSingleModal = true;
    }
}
