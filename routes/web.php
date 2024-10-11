<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);
    Route::get("/configuration", [\App\Http\Controllers\ConfigurationController::class, "index"]);
    Route::get("/reports", [\App\Http\Controllers\ReportsController::class, "index"]);
    Route::resource("/users", \App\Http\Controllers\UserController::class, ['except' => ['view']]);
});

Auth::routes();
