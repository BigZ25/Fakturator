<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Modules\Adverts\Advert;
use App\Models\Modules\Adverts\AdvertPhoto;
use Illuminate\Support\Facades\Storage;

class AdvertPhotosController extends Controller
{
    public function show(Advert $advert, AdvertPhoto $photo)
    {
        return Storage::disk('photos')->response($photo->key);
    }
}
