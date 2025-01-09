<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;

// Auth routes

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Resource routes

Route::apiResource('users', UserController::class);
Route::apiResource('products', ProductController::class);

// Protected routes

Route::group(['middleware' => ['auth:sanctum']], function () {
});