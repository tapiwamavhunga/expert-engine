<?php

// Facades
use Illuminate\Support\Facades\{
    Auth,
    Route
};

// Admin Restful Controllers
use App\Http\Controllers\All\ProfileController;
use App\Http\Controllers\Admin\{
    ActivityLogController,
    DashboardController,
    UserController
};

// USer - Restful Controllers
use App\Http\Controllers\User\{
    ActivityLogController as UserActivityLogController,
    DashboardController as UserDashboardController,
};

// Shared Restful Controllers
use App\Http\Controllers\All\{
    TmpImageUploadController
};


Route::get('/', function () {
    return redirect(route('login'));
});


// Admin
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'],function() {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('user', UserController::class);
    Route::resource('users', UserController::class);
    Route::resource('companies', App\Http\Controllers\CompanyController::class, []);
        Route::resource('orders', App\Http\Controllers\OrderController::class, []);

    // Route::resource('recquests', App\Http\Controllers\RecquestsController::class, []);

        Route::resource('users/{user}/user_emegency_contact', App\Http\Controllers\UserUserEmegencyContactController::class, ["as" => "users",]);
        Route::resource('users/{user}/user_preference', App\Http\Controllers\UserUserPreferenceController::class, ["as" => "users",]);
            Route::resource('users/{user}/user_profiles', App\Http\Controllers\UserUserProfileController::class, ["as" => "users",]);
            Route::resource('users/{user}/user_travel_passports', App\Http\Controllers\UserUserTravelPassportController::class, ["as" => "users",]);
             Route::resource('users/{user}/user_travel_recquest', App\Http\Controllers\UserUserTravelRecquestController::class, ["as" => "users",]);
             Route::resource('users/{user}/user_travel_visas', App\Http\Controllers\UserUserTravelVisaController::class, ["as" => "users",]);
             Route::resource('users/{user}/user_profiles', App\Http\Controllers\UserUserProfileController::class, ["as" => "users",]);
    Route::resource('user_profiles', App\Http\Controllers\UserProfileController::class, []);


  // Route::resource('travel_recquests', App\Http\Controllers\TravelRecquestController::class, []);

    Route::resource('activity', ActivityLogController::class);
    
});


// User
Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'as' => 'user.'],function() {
        Route::resource('dashboard', UserDashboardController::class);
        Route::resource('activity', UserActivityLogController::class);
                Route::resource('my_orders', App\Http\Controllers\OrdersController::class, []);

});


// Auth
Route::group(['middleware' => ['auth']],function() {
    // TMP FILE UPLOAD
    Route::delete('tmp_upload/revert', [TmpImageUploadController::class, 'revert']);
    Route::post('tmp_upload/content', [TmpImageUploadController::class, 'faqImageUpload'])->name('tmpupload.faqImageUpload');
    Route::resource('tmp_upload', TmpImageUploadController::class);
    Route::resource('profile', ProfileController::class)->parameter('profile', 'user');;
  
});


Auth::routes(['register' => false]);

