<?php

namespace App\Services\Modules;

use App\Http\Requests\Modules\Adverts\AdvertRequest;
use App\Models\Modules\Invoices\Advert;
use App\Models\Modules\Invoices\AdvertPhoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdvertPhotosService
{
    public static function storePhotos(AdvertRequest $request, Advert $advert)
    {
        $advert->photos()->delete();

        if ($request->hasFile('photos')) {
            $allowedFileExtension = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'];
            $files = $request->file('photos');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $original_name = $file->getClientOriginalName();
                $check = in_array($extension, $allowedFileExtension);

                if ($check === true) {
                    $advertPhoto = AdvertPhoto::create([
                        'advert_id' => $advert->id,
                        'original_name' => $original_name,
                        'key' => md5(Str::random()),
                    ]);

                    if ($advertPhoto) {
                        Storage::disk('photos')->put($advertPhoto->key, $file->getContent());
                    }
                }
            }
        }
    }
}
