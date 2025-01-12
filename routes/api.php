<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Verified;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderProductController;

// Auth routes

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::get('verify-email/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verification.verify');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Resource routes

Route::apiResource('products', ProductController::class);

// Protected routes

Route::group(['middleware' => ['auth:sanctum']], function () {
  Route::apiResource('users', UserController::class);
  Route::apiResource('orders', OrderController::class);
  Route::apiResource('order-products', OrderProductController::class);
});
