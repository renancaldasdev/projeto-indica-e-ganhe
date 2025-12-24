<?php

use App\Customer\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

Route::post('/register-customer', [CustomerController::class, 'registerCustomer']);

