<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('users/{user}/user_travel_recquest', App\Http\Controllers\UserUserTravelRecquestController::class, ["as" => "users",]);
    
});
