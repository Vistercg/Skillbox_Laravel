<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ArticlesStepsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeControlled;
use App\Http\Controllers\TagsController;

Route::get('/', [HomeControlled::class, 'index']);

Route::get('/tags/{tag}', [TagsController::class, 'index']);

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

Route::post('articles/{article:slug}/steps', [ArticlesStepsController::class, 'storeSteps']);
Route::patch('/steps/{step}', [ArticlesStepsController::class, 'updateSteps']);
Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/admin/feedback', [AdminController::class, 'feedback']);
Route::get('/about', [HomeControlled::class, 'about']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
