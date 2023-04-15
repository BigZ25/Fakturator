<?php

namespace App\Http\Controllers\Modules;

use App\Classes\App\AppClass;

use App\Http\Controllers\Controller;
use App\Http\Requests\Modules\Collections\CollectionRequest;
use App\Models\Modules\Collections\Collection;

class CollectionsController extends Controller
{
    public function store(CollectionRequest $request)
    {
        $collection = Collection::create($request->validated() + ['user_id' => auth()->user()->id]);

        AppClass::addMessage('Kolekcja została zapisana');

        return response()->json(route('collections.show', $collection->id));

    }

    public function update(CollectionRequest $request, Collection $collection)
    {
        $collection->update($request->validated());

        AppClass::addMessage('Zmiany zostały zapisane');

        return response()->json(route('collections.show', $collection->id));
    }

    public function destroy(Collection $collection)
    {
        $collection->delete();

        AppClass::addMessage('Kolekcja została usunięta');

        return response()->json(route('collections.index'));
    }
}
