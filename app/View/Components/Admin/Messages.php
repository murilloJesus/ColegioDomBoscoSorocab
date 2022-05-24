<?php

namespace App\View\Components\Admin;

use App\Models\Message;
use Illuminate\View\Component;

class Messages extends Component
{

    public $last;
    public $count;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $mensagens = Message::where('status', 0)->orderBy('id', 'DESC')->get();
        $this->last = $mensagens->slice(0, 4);
        $this->count = $mensagens->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.messages');
    }
}
