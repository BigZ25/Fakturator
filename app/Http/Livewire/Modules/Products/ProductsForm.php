<?php

namespace App\Http\Livewire\Modules\Products;

use App\Enum\App\UnitsEnum;
use App\Enum\App\VatTypesEnum;
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
        $this->breadcrumbs = [
            'label' => 'Powrót do listy produktów',
            'route' => route('products.index')
        ];
        $this->entity_id = $entity_id;
        $this->product = new Product();

        if ($this->entity_id !== null) {
            $this->product = Product::find($this->entity_id);
            $this->authorize('isProductUser', $this->product);
        } else {
            $this->authorize('isActive', Product::class);
        }

        $this->lists = [
            'vat_types' => VatTypesEnum::getSelectList(),
            'units' => UnitsEnum::getSelectList(),
        ];
    }

    public function render()
    {
        $this->data['product'] = $this->product;

        return parent::render();
    }
}
