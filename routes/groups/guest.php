<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

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
