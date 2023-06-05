<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('users/{user}/user_preference', App\Http\Controllers\UserUserPreferenceController::class, ["as" => "users",]);
    
});
