<?php

use App\Http\Livewire\Modules\Notifications\NotificationsIndex;
use App\Http\Livewire\Modules\Notifications\NotificationsShow;
use Illuminate\Support\Facades\Route;

Route::get('notifications', NotificationsIndex::class)->name('notifications.index')->middleware('auth');
Route::get('notifications/{entity_id}', NotificationsShow::class)->name('notifications.show')->middleware('auth');
