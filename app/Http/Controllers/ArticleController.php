<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::query()->with('categories')->latest()->paginate(6);
        $categories = Category::all();

        return view('articles', [
            'articles' => $articles,
            'categories' => $categories
        ]);
    }
}
