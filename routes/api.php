<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\NotificationController;

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'store'])->middleware('auth:sanctum');
Route::patch('/categories/{id}', [CategoryController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->middleware('auth:sanctum');

Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/{id}', [ItemController::class, 'show']);
Route::post('/items', [ItemController::class, 'store'])->middleware('auth:sanctum');
Route::patch('/items/{id}', [ItemController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/items/{id}', [ItemController::class, 'destroy'])->middleware('auth:sanctum');

Route::get('/transactions', [TransactionController::class, 'index']);
Route::get('/transactions/{id}', [TransactionController::class, 'show']);
Route::post('/transactions', [TransactionController::class, 'store'])->middleware('auth:sanctum');
Route::patch('/transactions/{id}', [TransactionController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->middleware('auth:sanctum');

Route::get('/reports', [ReportController::class, 'index']);
Route::get('/reports/{id}', [ReportController::class, 'show']);
Route::post('/reports', [ReportController::class, 'store'])->middleware('auth:sanctum');
Route::patch('/reports/{id}', [ReportController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/reports/{id}', [ReportController::class, 'destroy'])->middleware('auth:sanctum');

Route::get('/notifications', [NotificationController::class, 'index'])->middleware('auth:sanctum');
Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});