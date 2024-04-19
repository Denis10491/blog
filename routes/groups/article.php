<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::controller(ArticleController::class)->group(function () {
    Route::get('/articles', 'index')->name('articles.index');
    Route::get('/articles/{article}', 'show')->name('articles.show');
});
