<?php

use App\Http\Controllers\Auth\Api\UserLoginController;
use App\Http\Controllers\Auth\Api\UserRegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::middleware('throttle:3,1')->group(function() {
        Route::post('/login', UserLoginController::class);
        Route::post('/register', UserRegisterController::class);
    });

    Route::middleware(['auth:sanctum'])->group(function () {
        // Test
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });
});
