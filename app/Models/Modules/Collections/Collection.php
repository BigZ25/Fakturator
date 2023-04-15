<?php

namespace App\Models\Modules\Collections;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;
use Illuminate\Support\Collection as LaravelCollection;

class Collection extends Model
{
    use HasFactory, Userstamps, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'user_id'
    ];

    public function items()
    {
        return $this->hasMany(CollectionItem::class);
    }

    public function getDeletionAttribute(): LaravelCollection
    {
        $deletion = new LaravelCollection();
        $deletion->title = "Usuwanie kolekcji";
        $deletion->content = "Czy napewno chcesz usunąć kolekcję " . $this->name . "?";
        $deletion->url = route('collections.destroy', $this->id);

        return $deletion;
    }

    public function getTotalMarketPriceAttribute()
    {
        return $this->items->sum('market_price');
    }

    public function getData()
    {

    }
}
