<?php

use App\Http\Livewire\Modules\Queue\QueueIndex;
use App\Http\Livewire\Modules\Queue\QueueShow;
use Illuminate\Support\Facades\Route;

//kolejka
Route::get('queue', QueueIndex::class)->name('queue.index')->middleware('auth');
Route::get('queue/{entity_id}', QueueShow::class)->name('queue.show')->middleware('auth');
