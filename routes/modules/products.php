<?php

use App\Http\Controllers\Modules\ProductsController;
use App\Http\Livewire\Modules\Products\ProductsForm;
use App\Http\Livewire\Modules\Products\ProductsIndex;
use App\Http\Livewire\Modules\Products\ProductsShow;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductsController::class)->only(['store', 'update', 'destroy'])->middleware('auth');
Route::get('products', ProductsIndex::class)->name('products.index')->middleware('auth');
Route::get('products/create', ProductsForm::class)->name('products.create')->middleware('auth');
Route::get('products/{entity_id}', ProductsShow::class)->name('products.show')->middleware('auth');
Route::get('products/{entity_id}/edit', ProductsForm::class)->name('products.edit')->middleware('auth');
