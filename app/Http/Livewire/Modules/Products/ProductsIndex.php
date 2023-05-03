<?php

namespace App\Http\Livewire\Modules\Products;

use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\Modules\Products\Product;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

class ProductsIndex extends BaseIndexComponent
{
    use ActionButton;

    public function mount(): void
    {
        parent::mount();

        $this->title = 'Lista produktów';
        $this->currentModule = 'products';
    }

    public function datasource(): Builder
    {
        return Product::query();
    }

    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('name')
            ->addColumn('nip')
            ->addColumn('full_address');
    }

    public function columns(): array
    {
        return [
            Column::make('Nazwa', 'name')
                ->sortable(),

            Column::make('NIP', 'nip')
                ->sortable(),

            Column::make('Pełny adres', 'full_address')
                ->sortable(),
        ];
    }

    public function header(): array
    {
        $actions = [
            Button::add('delete')
                ->caption('Dodaj produkt')
                ->class(buttonClass('positive'))
                ->icon('plus')
                ->route('products.create', [])
                ->target('_self'),
        ];

        return array_merge($actions, parent::header());
    }

    public function actions(): array
    {
        return parent::actions();
    }

//    public $item;
//    public $deleteSingleModal;
//
//    public function mount()
//    {
//        $this->title = 'Lista produktów';
//        $this->view_path = 'modules.products.index';
//        $this->currentModule = 'products';
////        $this->item = null;
////        $this->deleteSingleModal = false;
////        $this->addToOlxSingleModal = false;
////        $this->category_tmp = ProductCategoriesEnum::ANTIQUES_AND_COLLECTIONS_OTHER_COLLECTIONS;
//
////        $this->lists = [
////            'statuses' => ProductStatusesEnum::getSelectList(),
////            'olx_statuses' => ProductOlxStatusesEnum::getSelectList(),
////            'categories' => ProductCategoriesEnum::getSelectList(),
////        ];
////
////        $this->forms = [
////            'phrase' => ['field' => Product::searchField(), 'operator' => 'like', 'value' => null],
////            'status' => ['field' => 'status', 'operator' => '=', 'value' => null],
////            'olx_status' => ['field' => 'olx_status', 'operator' => '=', 'value' => null],
////        ];
//
//        $this->original_forms = $this->forms;
//    }
//
//    public function render()
//    {
//        $products = $this->searchForm(Product::query());
//
//        $i = 0;
//
//        foreach ($products as $product) {
//            $this->checkboxes[$i]['model'] = class_basename($product);
//            $this->checkboxes[$i]['db_id'] = $product->id;
//
//            $i++;
//        }
//
//        $this->data = compact('products');
//
//        return parent::render();
//    }
}
