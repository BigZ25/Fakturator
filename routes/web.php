<?php

use App\Classes\App\AppClass;
use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\BrowserNotificationsController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\AccountSettingsForm;
use App\Models\AccessToken;
use App\Models\Code;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('login', [AuthController::class, 'index'])->name('login.form');
Route::post('login', [AuthController::class, 'auth'])->name('login.auth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('account_settings', AccountSettingsForm::class)->name('account_settings.form');
Route::put('account_settings', [AccountSettingsController::class, 'store'])->name('account_settings.store');

Route::get('browser_notifications', [BrowserNotificationsController::class, 'index'])->name('browser_notifications.index')->middleware('auth');
Route::put('browser_notifications/{entity_id}', [BrowserNotificationsController::class, 'update'])->name('browser_notifications.update')->middleware('auth');

Route::post('remove_code', function () {
    Code::query()->delete();
    AccessToken::query()->delete();

    AppClass::addMessage('Kod został usunięty.');

    return Redirect(route('home'));
})->name('remove_code')->middleware('auth');

include_once 'modules/invoices.php';
include_once 'modules/description_template.php';
include_once 'modules/queue.php';
include_once 'modules/observations.php';
include_once 'modules/notifications.php';
include_once 'modules/collections.php';

//Sprawdź sesję
Route::get('session', function () {
    if (!auth()->user()) {
        return response()->json([
            'message' => 'Session expired',
            'url' => route('login.form'),
            'code' => 440
        ], 220);
    }

    return response()->json("OK", 200);
});
