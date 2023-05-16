<?php

namespace App\Providers;

use App\Models\Modules\Customers\Customer;
use App\Models\Modules\Invoices\Invoice;
use App\Models\Modules\Products\Product;
use App\Policies\Modules\CustomerPolicy;
use App\Policies\Modules\InvoicePolicy;
use App\Policies\Modules\ProductPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Invoice::class => InvoicePolicy::class,
        Product::class => ProductPolicy::class,
        Customer::class => CustomerPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
