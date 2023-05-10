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

        AppClass::addMessage('Produkt został zapisany');

        return response()->json(route('products.show', $product->id));

    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        AppClass::addMessage('Zmiany zostały zapisane');

        return response()->json(route('products.show', $product->id));
    }

    public function destroy($customerId)
    {
        if (request()->has('ids') && (int)$customerId === 0) {
            $customers = Customer::query()
                ->whereIn('id', request()->input('ids'))
                ->get();

            foreach ($customers as $customer) {
                $customer->delete();
            }

            AppClass::addMessage('Produkty zostały usunięte');
        } else {
            $customer = Customer::find($customerId);

            if ($customer) {
                $customer->delete();

                AppClass::addMessage('Produkt został usunięty');
            }
        }

        return response()->json(route('customers.index'));
    }
}
