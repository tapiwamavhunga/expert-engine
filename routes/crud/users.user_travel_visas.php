<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('users/{user}/user_travel_visas', App\Http\Controllers\UserUserTravelVisaController::class, ["as" => "users",]);
    
});
