<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('users/{user}/user_profiles', App\Http\Controllers\UserUserProfileController::class, ["as" => "users",]);
    
});
