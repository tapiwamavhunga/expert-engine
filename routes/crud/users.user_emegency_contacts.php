<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('users/{user}/user_emegency_contact', App\Http\Controllers\UserUserEmegencyContactController::class, ["as" => "users",]);
    
});
