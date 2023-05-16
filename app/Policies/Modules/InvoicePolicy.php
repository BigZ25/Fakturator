<?php

namespace App\Policies\Modules;

use App\Models\Modules\Invoices\Invoice;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoicePolicy
{
    use HandlesAuthorization;

    public function isActive(User $user)
    {
        return $user->is_active;
    }

    public function isInvoiceUser(User $user, Invoice $invoice)
    {
        return false;
        if ($this->isActive($user)) {
            return $invoice->user_id === $user->id;
        }

        return false;
    }
}
