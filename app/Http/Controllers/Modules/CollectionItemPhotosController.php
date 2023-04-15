<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Modules\Collections\Collection;
use App\Models\Modules\Collections\CollectionItem;
use App\Models\Modules\Collections\CollectionItemPhoto;
use Illuminate\Support\Facades\Storage;

class CollectionItemPhotosController extends Controller
{
    public function show(Collection $collection, CollectionItem $item, CollectionItemPhoto $photo)
    {
        return Storage::disk('photos')->response($photo->key);
    }
}
