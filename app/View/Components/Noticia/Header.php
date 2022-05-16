<?php

namespace App\View\Components\Noticia;

use Illuminate\View\Component;

class Header extends Component
{

    public $header = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cabecalho)
    {
        $this->getBigAndSmall($cabecalho->title);
        $this->header['subtitle'] = $cabecalho->subtitle;
        $this->header['image'] = $cabecalho->image;
        $this->header['alias'] = $cabecalho->alias;
        $this->header['id'] = $cabecalho->id;
    }

    private function getBigAndSmall($title)
    {
        $exp_header = explode(' ', $title);
        $this->header['big'] = [$exp_header[0], $exp_header[1], $exp_header[2]];

        unset($exp_header[0], $exp_header[1], $exp_header[2]);

        $this->header['small'] = implode(' ', $exp_header);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.noticia.header');
    }
}
