<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('companies', App\Http\Controllers\CompanyController::class, []);
    //@softdelete
    Route::put('companies/{company}/restore', [App\Http\Controllers\CompanyController::class, 'restore'])->name('companies.restore');
    Route::delete('companies/{company}/purge', [App\Http\Controllers\CompanyController::class, 'purge'])->name('companies.purge');
    //@endsoftdelete
});
