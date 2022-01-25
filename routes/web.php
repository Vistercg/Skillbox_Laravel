<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeContoller;

Route::get('/', [HomeContoller::class, 'index']);

/**
 * GET /articles/create (create)
 * POST /articles (store)
 * GET /articles/1 (show)
 * GET /articles/1/edit (edit)
 * PATCH /articles/1 (update)
 * DELETE /articles/1 (destroy)
 */

Route::resource('/articles', ArticlesController::class)->parameters([
    'articles' => 'article:slug',
]);

Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/admin/feedback', [AdminController::class, 'feedback']);
Route::get('/about', [HomeContoller::class, 'about']);


