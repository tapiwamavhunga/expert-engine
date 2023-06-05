<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('countries', App\Http\Controllers\CountryController::class, []);
    
});
