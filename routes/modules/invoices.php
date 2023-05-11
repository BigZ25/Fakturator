<?php

use App\Http\Controllers\Modules\InvoicesController;
use App\Http\Livewire\Modules\Invoices\InvoicesForm;
use App\Http\Livewire\Modules\Invoices\InvoicesIndex;
use App\Http\Livewire\Modules\Invoices\InvoicesShow;
use Illuminate\Support\Facades\Route;

Route::resource('invoices', InvoicesController::class)->only(['store', 'update', 'destroy'])->middleware('auth');
Route::get('invoices', InvoicesIndex::class)->name('invoices.index')->middleware('auth');
Route::get('invoices/create', InvoicesForm::class)->name('invoices.create')->middleware('auth');
Route::get('invoices/{entity_id}', InvoicesShow::class)->name('invoices.show')->middleware('auth');
Route::get('invoices/{entity_id}/edit', InvoicesForm::class)->name('invoices.edit')->middleware('auth');
Route::get('invoices/{entity_id}/copy', InvoicesForm::class)->name('invoices.copy')->middleware('auth');
Route::get('invoices/{entity_id}/correction', InvoicesForm::class)->name('invoices.correction')->middleware('auth');
Route::get('invoices/{entity_id}/pdf', [InvoicesController::class, 'pdf'])->name('invoices.pdf')->middleware('auth');
