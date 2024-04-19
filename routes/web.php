<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

require_once __DIR__.'/groups/article.php';

require_once __DIR__.'/groups/auth.php';

require_once __DIR__.'/groups/guest.php';
