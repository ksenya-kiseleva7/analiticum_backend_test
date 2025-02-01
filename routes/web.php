<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

// Маршрут для входа (без аутентификации)
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Выход из системы
    Route::post('/logout', [AuthController::class, 'logout']);

    // Курьеры
    Route::post('/couriers', [CourierController::class, 'store']);
    Route::get('/couriers/{id}', [CourierController::class, 'show']);
    Route::patch('/couriers/{id}', [CourierController::class, 'update']);

    // Заказы
    Route::post('/orders', [OrderController::class, 'store']);
    Route::post('/orders/assign', [OrderController::class, 'assign']);
    Route::post('/orders/complete', [OrderController::class, 'complete']);
});



