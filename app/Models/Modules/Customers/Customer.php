<?php

namespace App\Models\Modules\Customers;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Customer extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',

        'buyer_nip',
        'buyer_name',
        'buyer_address',
        'buyer_postcode',
        'buyer_city',
    ];

    public function getDeletionAttribute(): Collection
    {
        $deletion = new Collection();
        $deletion->title = "Usuwanie klienta";
        $deletion->content = "Czy napewno chcesz usunąć klienta " . $this->name . "?";
        $deletion->route = route('customers.destroy', $this->id);

        return $deletion;
    }
}
