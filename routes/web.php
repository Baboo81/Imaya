<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnePageController;

Route::get('/', [OnePageController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
