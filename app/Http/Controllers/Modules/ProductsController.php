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
        $this->authorize('isActive', Product::class);

        $product = Product::create($request->validated() + ['user_id' => auth()->user()->id]);

        AppClass::addMessage('Produkt został zapisany');

        return response()->json(route('products.show', $product->id));

    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->authorize('isProductUser', $product);

        $product->update($request->validated());

        AppClass::addMessage('Zmiany zostały zapisane');

        return response()->json(route('products.show', $product->id));
    }

    public function destroy($productId)
    {
        if (request()->has('ids') && (int)$productId === 0) {
            $products = Product::query()
                ->whereIn('id', request()->input('ids'))
                ->get();

            foreach ($products as $product) {
                $this->authorize('isProductUser', $product);
                $product->delete();
            }

            AppClass::addMessage('Produkty zostały usunięte');
        } else {
            $product = Product::find($productId);

            if ($product) {
                $this->authorize('isProductUser', $product);
                $product->delete();

                AppClass::addMessage('Produkt został usunięty');
            }
        }

        return response()->json(route('products.index'));
    }
}
