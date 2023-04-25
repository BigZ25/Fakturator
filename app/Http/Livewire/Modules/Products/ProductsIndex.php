<?php

namespace App\Http\Livewire\Modules\Products;

use App\Http\Livewire\BaseComponents\BaseIndexComponent;
use App\Models\Modules\Products\Product;

class ProductsIndex extends BaseIndexComponent
{
    public $item;
    public $deleteSingleModal;

    public function mount()
    {
        $this->title = 'Lista produktów';
        $this->view_path = 'modules.products.index';
        $this->currentModule = 'products';
//        $this->item = null;
//        $this->deleteSingleModal = false;
//        $this->addToOlxSingleModal = false;
//        $this->category_tmp = ProductCategoriesEnum::ANTIQUES_AND_COLLECTIONS_OTHER_COLLECTIONS;

//        $this->lists = [
//            'statuses' => ProductStatusesEnum::getSelectList(),
//            'olx_statuses' => ProductOlxStatusesEnum::getSelectList(),
//            'categories' => ProductCategoriesEnum::getSelectList(),
//        ];
//
//        $this->forms = [
//            'phrase' => ['field' => Product::searchField(), 'operator' => 'like', 'value' => null],
//            'status' => ['field' => 'status', 'operator' => '=', 'value' => null],
//            'olx_status' => ['field' => 'olx_status', 'operator' => '=', 'value' => null],
//        ];

        $this->original_forms = $this->forms;
    }

    public function render()
    {
        $products = $this->searchForm(Product::query());

        $i = 0;

        foreach ($products as $product) {
            $this->checkboxes[$i]['model'] = class_basename($product);
            $this->checkboxes[$i]['db_id'] = $product->id;

            $i++;
        }

        $this->data = compact('products');

        return parent::render();
    }
}
