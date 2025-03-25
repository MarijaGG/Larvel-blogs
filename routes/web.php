<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/blogs', [BlogController::class, 'store']);
Route::post('/categories', [CategoryController::class, 'store']);

Route::put('/blogs/{blog}', [BlogController::class, 'update']);
Route::put('/categories/{category}', [CategoryController::class, 'update']);

Route::get('/', [BlogController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/create', [BlogController::class, 'create']);
Route::get('/categories/create', [CategoryController::class, 'create']);

Route::get('/blogs/edit/{blog}', [BlogController::class, 'edit']);
Route::get('/categories/edit/{category}', [CategoryController::class, 'edit']);

Route::get('/blogs/{blog}', [BlogController::class, 'show']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);

Route::delete('/blogs/{blog}', [BlogController::class, 'destroy']);
Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);














