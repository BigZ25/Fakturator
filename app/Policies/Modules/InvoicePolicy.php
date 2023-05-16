<?php

namespace App\Policies\Modules;

use App\Models\Modules\Invoices\Invoice;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoicePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {

    }

    public function show(User $user, Invoice $invoice)
    {
        return !$invoice->is_in_queue;
    }

    public function edit(User $user, Invoice $invoice)
    {
        return !$invoice->is_in_queue;
    }

    public function update(User $user, Invoice $invoice)
    {
        return !$invoice->is_in_queue;
    }
}
