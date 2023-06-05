<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('user_profiles', App\Http\Controllers\UserProfileController::class, []);
    
});
