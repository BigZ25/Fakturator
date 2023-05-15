<?php

use App\Http\Controllers\SettingsController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\SettingsForm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('register', [AuthController::class, 'RegisterForm'])->name('register.form');
Route::post('register', [AuthController::class, 'RegisterPost'])->name('register.post');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('settings', SettingsForm::class)->name('settings.form');
Route::put('settings', [SettingsController::class, 'store'])->name('settings.store');

include_once 'modules/invoices.php';
include_once 'modules/products.php';
include_once 'modules/customers.php';

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
