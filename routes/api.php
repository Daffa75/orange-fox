<?php

use App\Http\Controllers\Api\OfferingController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/posts', [PostController::class, 'index'])->middleware('auth:sanctum');
Route::get('/posts/{slug}', [PostController::class, 'show'])->middleware('auth:sanctum');
Route::get('/offerings', [OfferingController::class, 'index'])->middleware('auth:sanctum');
Route::get('/offerings/{slug}', [OfferingController::class, 'show'])->middleware('auth:sanctum');

