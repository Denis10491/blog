<?php

namespace App\View\Components\Admin;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MinifiedArticle extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Article $article)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.minified-article');
    }
}
