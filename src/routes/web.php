<?php
/**
 * @author Muhammad Tashfeen
 */

use Illuminate\Support\Facades\Route;
use MuhammadTashfeen\LaraAuthpem\Http\Controllers\UserController;

Route::middleware('mt.authpem')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
});
