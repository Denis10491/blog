<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreArticleRequest;
use App\Http\Requests\Admin\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::query()->with('categories')->latest()->paginate(6);
        return view('admin.article.index', ['articles' => $articles]);
    }

    public function show(Article $article): View
    {
        return view('admin.article.update', ['article' => $article]);
    }

    public function showFormCreate(): View
    {
        return view('admin.article.create');
    }

    public function store(StoreArticleRequest $request): RedirectResponse
    {
        $request->validated();

        $path = $request->file('cover')->storePublicly('articles', 'public');
        Storage::disk('public')->url($path);
        $path = env('APP_URL').'/storage/'.$path;

        Article::create([
            'cover' => $path,
            ...$request->except('cover', '_token')
        ]);

        return redirect()->back()->with('status', 'Статья создана');
    }

    public function update(Article $article, UpdateArticleRequest $request): RedirectResponse
    {
        $request->validated();

        $data = [];

        if (isset($request->cover)) {
            $path = $request->file('cover')->storePublicly('articles', 'public');
            Storage::disk('public')->url($path);
            $data['cover'] = env('APP_URL').'/storage/'.$path;
        }

        if (isset($request->title)) {
            $data['title'] = $request->title;
        }

        if (isset($request->body)) {
            $data['body'] = $request->body;
        }

        if (isset($request->source_url)) {
            $data['source_url'] = $request->source_url;
        }

        if (isset($request->author)) {
            $data['author'] = $request->author;
        }

        $article->update($data);

        return redirect()->back()->with('status', 'Статья обновлена');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();
        return redirect()->back();
    }
}
