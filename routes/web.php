<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(ArticleController::class)->group(function () {
    Route::get('/articles', 'index')->name('articles.index');
    Route::get('/articles/{article}', 'show')->name('articles.show');
});

Route::middleware('auth:admin')->prefix('/admin')->as('admin.')->group(function () {
    Route::controller(AdminArticleController::class)->group(function () {
        Route::get('/', 'index')->name('articles.index');
        Route::get('/articles/create', 'showFormCreate')->name('articles.create');
        Route::get('/articles/{article}', 'show')->name('articles.show');

        Route::post('/api/articles', 'store')->name('api.articles.store');
        Route::patch('/api/articles/{article}', 'update')->name('api.articles.update');
        Route::delete('/api/articles/{article}', 'destroy')->name('api.articles.destroy');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::patch('/api/user/{user}/profile', [UserController::class, 'updateProfile'])->name('api.user.update.profile');
    Route::patch('/api/user/{user}/password',
        [UserController::class, 'updatePassword'])->name('api.user.update.password');
    Route::post('/api/logout', [LogoutController::class, 'logout'])->name('api.logout');
});

Route::middleware('guest')->group(function () {

    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'index')->name('register');
        Route::post('/api/register', 'register')->name('api.register');
    });

    Route::controller(AdminLoginController::class)->group(function () {
        Route::get('admin/login', 'index')->name('admin.login');
        Route::post('admin/api/login', 'login')->name('admin.api.login');
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
