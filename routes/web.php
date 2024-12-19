<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{slug}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::patch('/articles/{slug}', [ArticleController::class, 'update'])->name('articles.update');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('article.show');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
