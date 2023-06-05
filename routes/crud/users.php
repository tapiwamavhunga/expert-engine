<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('users', App\Http\Controllers\Admin\UserController::class, []);
    
});
