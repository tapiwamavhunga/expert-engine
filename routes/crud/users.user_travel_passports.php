<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('users/{user}/user_travel_passports', App\Http\Controllers\UserUserTravelPassportController::class, ["as" => "users",]);
    
});
