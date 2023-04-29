<?php

namespace App\Models\Modules\Products;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Product extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'vat_type',
        'quantity',
        'price'
    ];

    public function getDeletionAttribute(): Collection
    {
        $deletion = new Collection();
        $deletion->title = "Usuwanie produktu";
        $deletion->content = "Czy napewno chcesz usunąć produkt " . $this->name . "?";
        $deletion->route = route('products.destroy', $this->id);

        return $deletion;
    }
}
