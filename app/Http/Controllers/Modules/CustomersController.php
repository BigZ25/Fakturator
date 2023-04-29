<?php

namespace App\Http\Controllers\Modules;

use App\Classes\App\AppClass;

use App\Http\Controllers\Controller;
use App\Http\Requests\Modules\Customers\CustomerRequest;
use App\Models\Modules\Customers\Customer;

class CustomersController extends Controller
{
    public function store(CustomerRequest $request)
    {
        $product = Customer::create($request->validated() + ['user_id' => auth()->user()->id]);

        AppClass::addMessage('Kolekcja została zapisana');

        return response()->json(route('products.show', $product->id));

    }

    public function update(CustomerRequest $request, Customer $product)
    {
        $product->update($request->validated());

        AppClass::addMessage('Zmiany zostały zapisane');

        return response()->json(route('products.show', $product->id));
    }

    public function destroy(Customer $product)
    {
        $product->delete();

        AppClass::addMessage('Produkt został usunięty');

        return response()->json(route('products.index'));
    }
}
