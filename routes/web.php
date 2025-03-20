<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/blogs', [BlogController::class, 'store']);

Route::put('/blogs/{blog}', [BlogController::class, 'update']);

Route::get('/', [BlogController::class, 'index']);

Route::get('/create', [BlogController::class, 'create']);

Route::get('/blogs/edit/{blog}', [BlogController::class, 'edit']);

Route::get('/blogs/{blog}', [BlogController::class, 'show']);

Route::delete('/blogs/{blog}', [BlogController::class, 'destroy']);

