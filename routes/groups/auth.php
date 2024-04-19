<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::patch('/api/user/{user}/profile', [UserController::class, 'updateProfile'])->name('api.user.update.profile');
    Route::patch('/api/user/{user}/password',
        [UserController::class, 'updatePassword'])->name('api.user.update.password');
    Route::post('/api/logout', [LogoutController::class, 'logout'])->name('api.logout');
});
