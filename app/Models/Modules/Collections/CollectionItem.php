<?php

namespace App\Models\Modules\Collections;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection as LaravelCollection;
use Wildside\Userstamps\Userstamps;

class CollectionItem extends Model
{
    use HasFactory, Userstamps, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'collection_id',
        'buy_date',
        'sell_date',
        'market_price_updated_at',
        'buy_price',
        'sell_price',
        'market_price'
    ];

    public function photos()
    {
        return $this->hasMany(CollectionItemPhoto::class);
    }

    public function getPhotosAttribute()
    {
        return $this->photos()->get();
    }

    public function getDeletionAttribute(): LaravelCollection
    {
        $deletion = new LaravelCollection();
        $deletion->title = "Usuwanie kolekcji";
        $deletion->content = "Czy napewno chcesz pozycję " . $this->name . "?";
        $deletion->url = route('collections.items.destroy', [$this->collection_id, $this->id]);

        return $deletion;
    }

    public function getData()
    {

    }
}
