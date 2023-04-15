<?php

namespace App\Models\Modules\Collections;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionItemPhoto extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'collection_item_id',
        'original_name',
        'key'
    ];

    public function collectionItem()
    {
        return $this->belongsTo(CollectionItem::class);
    }

    public function getData()
    {

    }
}
