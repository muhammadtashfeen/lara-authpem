<?php

/**
 * @author Muhammad Tashfeen
 */

use Illuminate\Support\Facades\Route;
use MuhammadTashfeen\LaraAuthpem\Http\Controllers\UserController;

Route::middleware(['auth', 'mt.authpem'])->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
});
