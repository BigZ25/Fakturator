<?php

use App\Http\Controllers\Modules\DescriptionTemplatesController;
use App\Http\Livewire\Modules\DescriptionTemplates\DescriptionTemplatesForm;
use Illuminate\Support\Facades\Route;

//ogloszenia
Route::resource('description_template', DescriptionTemplatesController::class)->only(['store'])->middleware('auth');
Route::get('description_template', DescriptionTemplatesForm::class)->name('description_template.index')->middleware('auth');
