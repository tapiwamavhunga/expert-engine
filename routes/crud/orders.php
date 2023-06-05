<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('orders', App\Http\Controllers\OrderController::class, []);
    
});
