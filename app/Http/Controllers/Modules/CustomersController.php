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
        $this->authorize('isActive', Customer::class);

        $customer = Customer::create($request->validated() + ['user_id' => auth()->user()->id]);

        AppClass::addMessage('Klient został zapisany');

        return response()->json(route('customers.show', $customer->id));
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        $this->authorize('isCustomerUser', $customer);

        $customer->update($request->validated());

        AppClass::addMessage('Zmiany zostały zapisane');

        return response()->json(route('customers.show', $customer->id));
    }

    public function destroy($customerId)
    {
        if (request()->has('ids') && (int)$customerId === 0) {
            $customers = Customer::query()
                ->whereIn('id', request()->input('ids'))
                ->get();

            foreach ($customers as $customer) {
                $this->authorize('isCustomerUser', $customer);
                $customer->delete();
            }

            AppClass::addMessage('Klienci zostali usunięci');
        } else {
            $customer = Customer::find($customerId);

            $this->authorize('isCustomerUser', $customer);

            if ($customer) {
                $customer->delete();

                AppClass::addMessage('Klient został usunięty');
            }
        }

        return response()->json(route('customers.index'));
    }
}
