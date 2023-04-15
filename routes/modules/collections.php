<?php

use App\Http\Controllers\Modules\CollectionItemPhotosController;
use App\Http\Controllers\Modules\CollectionItemsController;
use App\Http\Controllers\Modules\CollectionsController;
use App\Http\Livewire\Modules\Collections\CollectionsForm;
use App\Http\Livewire\Modules\Collections\CollectionsIndex;
use App\Http\Livewire\Modules\Collections\CollectionsShow;
use App\Http\Livewire\Modules\Collections\Items\CollectionItemsForm;
use App\Http\Livewire\Modules\Collections\Items\CollectionItemsShow;
use Illuminate\Support\Facades\Route;

//ogloszenia
Route::resource('collections', CollectionsController::class)->only(['store', 'update', 'destroy'])->middleware('auth');
Route::get('collections', CollectionsIndex::class)->name('collections.index')->middleware('auth');
Route::get('collections/create', CollectionsForm::class)->name('collections.create')->middleware('auth');
Route::get('collections/{entity_id}', CollectionsShow::class)->name('collections.show')->middleware('auth');
Route::get('collections/{entity_id}/edit', CollectionsForm::class)->name('collections.edit')->middleware('auth');

//items
Route::resource('collections.items', CollectionItemsController::class)->only(['store', 'update', 'destroy'])->middleware('auth');
Route::get('collections/{collection_id}/items/create', CollectionItemsForm::class)->name('collections.items.create')->middleware('auth');
Route::get('collections/{collection_id}/items/{entity_id}', CollectionItemsShow::class)->name('collections.items.show')->middleware('auth');
Route::get('collections/{collection_id}/items/{entity_id}/edit', CollectionItemsForm::class)->name('collections.items.edit')->middleware('auth');

//zdjecia
Route::resource('collections.items.photos', CollectionItemPhotosController::class)->only(['show']);
