<?php

namespace App\Policies\Modules;

use App\Models\Modules\Customers\Customer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;

    public function isActive(User $user)
    {
        return $user->is_active;
    }

    public function isCustomerUser(User $user, Customer $customer)
    {
        if ($this->isActive($user)) {
            return $customer->user_id === $user->id;
        }

        return false;
    }
}
