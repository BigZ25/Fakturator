<?php

namespace App\Providers;

use App\Models\Modules\Customers\Customer;
use App\Models\Modules\Invoices\Invoice;
use App\Policies\Modules\CustomerPolicy;
use App\Policies\Modules\InvoicePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Invoice::class => InvoicePolicy::class,
        Customer::class => CustomerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
