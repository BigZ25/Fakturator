<?php

use App\Http\Controllers\Modules\ObservationsController;
use App\Http\Livewire\Modules\Observations\ObservationsForm;
use App\Http\Livewire\Modules\Observations\ObservationsIndex;
use App\Http\Livewire\Modules\Observations\ObservationsShow;
use Illuminate\Support\Facades\Route;

Route::resource('observations', ObservationsController::class)->only(['store', 'update', 'destroy'])->middleware('auth');
Route::get('observations', ObservationsIndex::class)->name('observations.index')->middleware('auth');
Route::get('observations/create', ObservationsForm::class)->name('observations.create')->middleware('auth');
Route::get('observations/{entity_id}', ObservationsShow::class)->name('observations.show')->middleware('auth');
Route::get('observations/{entity_id}/edit', ObservationsForm::class)->name('observations.edit')->middleware('auth');
