<?php

use App\Http\Controllers\Modules\AdvertPhotosController;
use App\Http\Controllers\Modules\AdvertsController;
use App\Http\Livewire\Modules\Adverts\AdvertsForm;
use App\Http\Livewire\Modules\Adverts\AdvertsIndex;
use App\Http\Livewire\Modules\Adverts\AdvertsShow;
use Illuminate\Support\Facades\Route;

//ogloszenia
Route::resource('adverts', AdvertsController::class)->only(['store', 'update'])->middleware('auth');
Route::get('adverts', AdvertsIndex::class)->name('adverts.index')->middleware('auth');
Route::get('adverts/create', AdvertsForm::class)->name('adverts.create')->middleware('auth');
Route::get('adverts/{entity_id}', AdvertsShow::class)->name('adverts.show')->middleware('auth');
Route::get('adverts/{entity_id}/edit', AdvertsForm::class)->name('adverts.edit')->middleware('auth');
//buttons
Route::post('adverts/delete', [AdvertsController::class, 'handleOperation'])->name('adverts.delete')->middleware('auth');
Route::post('adverts/add_to_olx', [AdvertsController::class, 'handleOperation'])->name('adverts.add_to_olx')->middleware('auth');
Route::post('adverts/mark', [AdvertsController::class, 'handleOperation'])->name('adverts.mark')->middleware('auth');

//zdjecia
Route::resource('adverts.photos', AdvertPhotosController::class)->only(['show']);
