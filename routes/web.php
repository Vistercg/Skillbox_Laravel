<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeContoller;


Route::get('/', [HomeContoller::class, 'index']);
Route::get('/articles/create', [ArticlesController::class, 'create']);
Route::post('/articles', [ArticlesController::class, 'store']);
Route::get('/articles/{article:slug}', [ArticlesController::class, 'show']);
Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/admin/feedback', [AdminController::class, 'feedback']);
Route::get('/about', [HomeContoller::class, 'about']);
// тест
