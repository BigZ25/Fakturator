<?php

namespace App\Models\Modules\Products;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Wildside\Userstamps\Userstamps;

class Product extends BaseModel
{
    use HasFactory, Userstamps, SoftDeletes;

    protected $fillable = [

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
