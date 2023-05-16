<?php

namespace App\Policies\Modules;

use App\Models\Modules\Products\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function isActive(User $user)
    {
        return $user->is_active;
    }

    public function isProductUser(User $user, Product $product)
    {
        if ($this->isActive($user)) {
            return $product->user_id === $user->id;
        }

        return false;
    }
}
