<?php

use App\Http\Controllers\Api\MenuController;
use Illuminate\Support\Facades\Route;

Route::prefix('menu')->group(function () {
    Route::get('/', [MenuController::class, 'index']);
    Route::post('/category', [MenuController::class, 'storeCategory']);
    Route::post('/food', [MenuController::class, 'storeFood']);
});
