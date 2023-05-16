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

//    public function create(User $user)
//    {
//        return $this->isActive($user);
//    }
//
//    public function show(User $user, Customer $customer)
//    {
//        $this->isCustomerUser($user, $customer);
//    }
//
//    public function edit(User $user, Customer $customer)
//    {
//        $this->isCustomerUser($user, $customer);
//    }
//
//    public function store(User $user)
//    {
//        $this->isCustomerUser($user, $customer);
//    }
//
//    public function update(User $user, Customer $customer)
//    {
//        $this->isCustomerUser($user, $customer);
//    }
//
//    public function delete(User $user, Customer $customer)
//    {
//        $this->isCustomerUser($user, $customer);
//    }
}
