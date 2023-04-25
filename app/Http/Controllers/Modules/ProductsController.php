<?php

namespace App\Http\Controllers\Modules;

use App\Classes\App\AppClass;

use App\Http\Controllers\Controller;
use App\Http\Requests\Modules\Products\ProductRequest;
use App\Models\Modules\Products\Product;

class ProductsController extends Controller
{
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->validated() + ['user_id' => auth()->user()->id]);

        AppClass::addMessage('Kolekcja została zapisana');

        return response()->json(route('products.show', $product->id));

    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        AppClass::addMessage('Zmiany zostały zapisane');

        return response()->json(route('products.show', $product->id));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        AppClass::addMessage('Kolekcja została usunięta');

        return response()->json(route('products.index'));
    }
}
