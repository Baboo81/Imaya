<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnePageController;

Route::get('/', [OnePageController::class, 'index']);
