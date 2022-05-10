<?php

namespace App\View\Components\Noticia;

use App\Models\News;
use Illuminate\View\Component;

class Menu extends Component
{


    public $categorias;
    public $visitados;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $news = News::where('status', 1)->orderBy('times_accessed')->get();

        $this->categorias = $news->unique('categories');
        $this->visitados = $news->slice(0, 3);

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.noticia.menu');
    }
}
