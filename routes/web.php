<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\PartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/cars');
});

Route::prefix('cars')->group(function () {
    Route::get('/', [CarController::class, 'index']);
    Route::get('/new', [CarController::class, 'new']);
    Route::get('/{car}', [CarController::class, 'edit']);
    Route::post('/', [CarController::class, 'store']);
    Route::put('/{car}', [CarController::class, 'update']);
    Route::delete('/{car}', [CarController::class, 'destroy']);
});

Route::prefix('parts')->group(function () {
    Route::get('/', [PartController::class, 'index']);
    Route::delete('/{part}', [PartController::class, 'delete']);
});

