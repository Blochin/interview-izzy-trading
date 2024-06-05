<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cars')->group(function (){
    Route::get('/', [CarController::class, 'index']);
    Route::post('/',[CarController::class, 'store']);
    Route::put('/{car}',[CarController::class, 'update']);
    Route::delete('/{car}',[CarController::class, 'destroy']);
});

