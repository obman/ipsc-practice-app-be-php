<?php

use App\Http\Controllers\Auth\Api\MemberProfileEmailVerificationController;
use App\Http\Controllers\Auth\Api\MemberProfileLoginController;
use App\Http\Controllers\Auth\Api\MemberProfileRegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    //Route::middleware('throttle:3,1')->group(function() {
        Route::post('/login', MemberProfileLoginController::class);
        Route::post('/register', MemberProfileRegisterController::class);
        Route::post('/verify-email', MemberProfileEmailVerificationController::class);
    //});

    Route::middleware(['auth:sanctum'])->group(function () {
        // Test
        Route::get('/member-profile', function (Request $request) {
            return $request->user();
        });
    });
});
