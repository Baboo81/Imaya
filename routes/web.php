<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnePageController;

Route::get('/', [OnePageController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

//Route en fonction de la langue choisie :
Route::get('/{locale?}', function ($locale = 'fr') {

    $supportedLocales = ['fr', 'en', 'it'];

    if (!in_array($locale, $supportedLocales)) {
        abort(404);
    }

    App::setlocale($locale);

    $data = include resource_path("lang/{$locale}/onepageData.php");

    return view('onepage', compact('data'));
})->name('onepage');


//Route : erreur 404
Route::get('/test-404', function (){
    abort(404);
});