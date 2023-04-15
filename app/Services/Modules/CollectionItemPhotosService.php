<?php

namespace App\Services\Modules;

use App\Http\Requests\Modules\Collections\CollectionItemRequest;
use App\Models\Modules\Collections\CollectionItem;
use App\Models\Modules\Collections\CollectionItemPhoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CollectionItemPhotosService
{
    public static function storePhotos(CollectionItemRequest $request, CollectionItem $collectionItem)
    {
        $collectionItem->photos()->delete();

        if ($request->hasFile('photos')) {
            $allowedFileExtension = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'];
            $files = $request->file('photos');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $original_name = $file->getClientOriginalName();
                $check = in_array($extension, $allowedFileExtension);

                if ($check === true) {
                    $collectionItemPhoto = CollectionItemPhoto::create([
                        'collection_item_id' => $collectionItem->id,
                        'original_name' => $original_name,
                        'key' => md5(Str::random()),
                    ]);

                    if ($collectionItemPhoto) {
                        Storage::disk('photos')->put($collectionItemPhoto->key, $file->getContent());
                    }
                }
            }
        }
    }
}
