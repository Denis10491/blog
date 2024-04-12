<?php

namespace App\View\Components;

use App\Models\Article as ArticleModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Article extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ArticleModel $article)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article');
    }
}
