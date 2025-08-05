<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;

// Home or create form page
Route::get('/', [ApplicationController::class, 'create'])->name('application.create');

// Store route for form submission
Route::post('/store', [ApplicationController::class, 'store'])->name('application.store');

// Use resource route for standard CRUD routes (index, create, store, show, edit, update, destroy)
Route::resource('application', ApplicationController::class);
