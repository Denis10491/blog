<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Cache::remember('paginated.articles', 90, function() {
            return Article::query()->with('categories')->latest()->paginate(6);
        });

        $categories = Cache::remember('categories', 120, function() {
            return Category::all();
        });

        return view('articles', [
            'articles' => $articles,
            'categories' => $categories
        ]);
    }
}
