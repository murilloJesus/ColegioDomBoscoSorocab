<?php

namespace App\View\Components\front;

use Illuminate\View\Component;

class Menu extends Component
{
    public $page;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($page = '')
    {
        $this->page = $page;
    }

    public function isPage($page){
        return $page === $this->page;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.menu');
    }
}
