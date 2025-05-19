<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\DeliveryPackageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryPersonnelController;

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return 'Welcome Admin';
    });
});

Route::middleware(['auth:sanctum', 'role:driver'])->group(function () {
    Route::get('/driver/dashboard', function () {
        return 'Welcome Driver';
    });
});

Route::middleware(['auth:sanctum', 'role:customer'])->group(function () {
    Route::get('/customer/dashboard', function () {
        return 'Welcome Customer';
    });
});

Route::patch('/packages/{id}/status', [DeliveryPackageController::class, 'updateStatus']);

Route::apiResource('packages', DeliveryPackageController::class);

// Custom route for updating status
Route::patch('/packages/{id}/status', [DeliveryPackageController::class, 'updateStatus']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('packages', DeliveryPackageController::class);
    Route::get('/delivery-packages', [DeliveryPackageController::class, 'index']);
    Route::post('/delivery-packages', [DeliveryPackageController::class, 'store']);
    Route::get('/delivery-packages/{id}', [DeliveryPackageController::class, 'show']);
    Route::put('/delivery-packages/{id}', [DeliveryPackageController::class, 'update']);
    Route::delete('/delivery-packages/{id}', [DeliveryPackageController::class, 'destroy']);
});

Route::apiResource('delivery-personnels', DeliveryPersonnelController::class);

Route::post('/delivery-packages/{id}/assign-personnel', [DeliveryPackageController::class, 'assignPersonnel']);