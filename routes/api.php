<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UserController;

// Main Routes
Route::get('/', function () {
    return response()->json([
        'status' => true,
        'message' => 'Welcome to the Inventory App API',
    ]);
});

// Authentication Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    // Profile Routes
    Route::get('/profile', [UserController::class, 'getProfile']);
    Route::put('/profile', [UserController::class, 'updateProfile']);

    // Inventory Routes
    Route::post('/inventory', [InventoryController::class, 'addInventory']);
    Route::put('/inventory/{id}', [InventoryController::class, 'updateInventory']);
    Route::delete('/inventory/{id}', [InventoryController::class, 'deleteInventory']);
    Route::get('/inventory', [InventoryController::class, 'listInventory']);
    Route::get('/inventory/{id}', [InventoryController::class, 'getInventoryById']);
});
