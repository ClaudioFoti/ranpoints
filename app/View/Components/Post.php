<?php

namespace App\View\Components;

use App\View\TailwindColorHelper;
use Illuminate\View\Component;

class Post extends Component
{
    public $tailwindColorHelper;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->tailwindColorHelper = new TailwindColorHelper();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post');
    }
}
