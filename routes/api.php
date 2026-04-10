<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('users', [UserController::class, 'index']);
    Route::post('assign-role', [UserController::class, 'assignRole']);

});


use App\Http\Controllers\TestController;

Route::get('/test', [TestController::class, 'test']);
