<?php

use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Authentication and Registration Routes
|--------------------------------------------------------------------------
|
| Define routes for user authentication and registration. These routes are
| responsible for handling login, registration, logout, and token refresh.
| All routes are protected by the 'auth:sanctum' middleware, except login
| and registration.
|
*/

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
    });
});
