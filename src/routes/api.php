<?php

use App\Http\Controllers\Auth\ApiAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/login', [ApiAuthController::class, 'login']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('/logout', [ApiAuthController::class, 'logout']);

        // Test
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });
});
