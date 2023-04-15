<?php

namespace App\Policies\Modules\Adverts;

use App\Models\Modules\Invoices\Advert;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvertPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {

    }

    public function edit(User $user, Advert $advert)
    {
        return !$advert->is_in_queue;
    }

    public function update(User $user, Advert $advert)
    {
        return !$advert->is_in_queue;
    }

    public function operation(User $user, Advert $advert)
    {
        return !$advert->is_in_queue;
    }
}
