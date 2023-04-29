<?php

use App\Http\Controllers\Modules\CustomersController;
use App\Http\Livewire\Modules\Customers\CustomersForm;
use App\Http\Livewire\Modules\Customers\CustomersIndex;
use App\Http\Livewire\Modules\Customers\CustomersShow;
use Illuminate\Support\Facades\Route;

Route::resource('customers', CustomersController::class)->only(['store', 'update', 'destroy'])->middleware('auth');
Route::get('customers', CustomersIndex::class)->name('customers.index')->middleware('auth');
Route::get('customers/create', CustomersForm::class)->name('customers.create')->middleware('auth');
Route::get('customers/{entity_id}', CustomersShow::class)->name('customers.show')->middleware('auth');
Route::get('customers/{entity_id}/edit', CustomersForm::class)->name('customers.edit')->middleware('auth');
