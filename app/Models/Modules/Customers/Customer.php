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
        'nip',
        'name',
        'address',
        'postcode',
        'city',
        'email'
    ];

    public function getDeletionAttribute(): Collection
    {
        $deletion = new Collection();
        $deletion->title = "Usuwanie klienta";
        $deletion->content = "Czy napewno chcesz usunąć klienta " . $this->name . "?";
        $deletion->route = route(self::destroyRoute(), $this->id);

        return $deletion;
    }

    public static function destroyRoute()
    {
        return 'customers.destroy';
    }
}
