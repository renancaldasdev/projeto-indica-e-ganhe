<?php

use App\Auth\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Customer\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

Route::post('/login', [AuthController::class, 'login']);

Route::post('/register-customer', [CustomerController::class, 'registerCustomer']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});
