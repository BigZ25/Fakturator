<?php

namespace App\Http\Controllers\Modules;

use App\Classes\App\AppClass;

use App\Http\Controllers\Controller;
use App\Http\Requests\Modules\Collections\CollectionItemRequest;
use App\Models\Modules\Collections\Collection;
use App\Models\Modules\Collections\CollectionItem;
use App\Services\Modules\CollectionItemPhotosService;

class CollectionItemsController extends Controller
{
    public function store(Collection $collection, CollectionItemRequest $request)
    {
        $data = $request->validated() + ['collection_id' => $collection->id];

        if ($request->market_price) {
            $data['market_price_updated_at'] = currentDate();
        }

        $item = CollectionItem::create($data);

        CollectionItemPhotosService::storePhotos($request, $item);
        AppClass::addMessage('Kolekcja została zapisana');

        return response()->json(route('collections.items.show', [$collection->id, $item->id]));

    }

    public function update(CollectionItemRequest $request, Collection $collection, CollectionItem $item)
    {
        $data = $request->validated();

        if ($item->market_price !== $request->market_price) {
            $data['market_price_updated_at'] = currentDate();
        }

        $item->update($data);

        CollectionItemPhotosService::storePhotos($request, $item);
        AppClass::addMessage('Zmiany zostały zapisane');

        return response()->json(route('collections.items.show', [$collection->id, $item->id]));
    }

    public function destroy(Collection $collection, CollectionItem $item)
    {
        $item->delete();

        AppClass::addMessage('Pozycja została usunięta');

        return response()->json(route('collections.show', $collection->id));
    }
}
