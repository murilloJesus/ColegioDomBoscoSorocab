<?php

namespace App\View\Components\front;

use App\Models\News as ModelsNews;
use Illuminate\View\Component;

class News extends Component
{

    public $popular_news = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $news = ModelsNews::where('status', 1)->orderBy('times_accessed', 'desc')->get();

        $this->popular_news = $news->slice(0, 4);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.news');
    }
}
