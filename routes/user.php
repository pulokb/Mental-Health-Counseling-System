<?php

use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProfileController;

// Default Laravel authentication routes
Auth::routes();

// Social Login Routes
Route::get('login/{provider}', 'Auth\UserLoginController@redirectToProvider')->name('login.social');
Route::get('login/{provider}/callback', 'Auth\UserLoginController@handleProviderCallback');

// User Routes with Middleware
Route::group(['middleware' => ['auth', 'role:user', 'preventBackHistory', 'blockIp', 'localaization']], function () {
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {

        // Dashboard Route
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


    });
});
