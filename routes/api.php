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

Route::get('auth', [AuthController::class, 'auth'])->middleware('auth:sanctum');
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::get('verify-email/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verification.verify');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->middleware('guest')->name('password.email');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->middleware('guest')->name('password.update');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Public routes

Route::apiResource('products', ProductController::class);
Route::apiResource('users', UserController::class);
Route::get('users/{id}/orders', [UserController::class, 'orders']);
Route::apiResource('orders', OrderController::class);
