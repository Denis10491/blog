<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(Request $request): View
    {
        $articles = Cache::remember('paginated.articles', 50, function () {
            return Article::query()->with('categories')->latest()->paginate(6);
        });

        if ($request->category) {
            $articles = Category::where('name', $request->category)->firstOrFail()
                ->articles()->with('categories')
                ->latest()->paginate(6);
        }

        $categories = Cache::remember('categories', 120, function () {
            return Category::all();
        });

        return view('articles', [
            'articles' => $articles,
            'categories' => $categories,
            'currentCategory' => $request->category
        ]);
    }

    public function show(Article $article): View
    {
        return view('article', ['article' => $article]);
    }
}
