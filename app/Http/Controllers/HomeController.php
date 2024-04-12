<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $articles = Cache::remember('articles', 45, function () {
            return Article::query()->with('categories')->latest()->limit(6)->get();
        });

        return view('home', ['articles' => $articles]);
    }
}
