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
        $deletion->title = "Usuwanie ogłoszenia";
        $deletion->content = "Czy napewno chcesz usunąć ogłoszenie " . $this->full_name . "?";
        $deletion->route = route('invoices.delete');

        return $deletion;
    }
}
