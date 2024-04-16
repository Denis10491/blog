<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(ArticleController::class)->group(function () {
    Route::get('/articles', 'index')->name('articles.index');
    Route::get('/articles/{article}', 'show')->name('articles.show');
});

Route::middleware('guest')->group(function () {

    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'index')->name('register');
        Route::post('/api/register', 'register')->name('api.register');
    });

    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/api/login', 'login')->name('api.login');
    });

    Route::controller(ForgotPasswordController::class)->group(function () {
        Route::get('/forgot-password', 'index')->name('password.index');
        Route::post('/api/forgot-password', 'request')->name('api.password.request');
    });

    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('/forgot-password/reset', 'index')->name('password.reset');
        Route::post('/api/forgot-password/reset', 'reset')->name('api.password.reset');
    });

});

Route::post('/api/logout', [LogoutController::class, 'logout'])->name('api.logout');
