<?php

namespace M4riachi\LaravelComment\View\Components;

use Illuminate\View\Component;

class FrontListComment extends Component
{
    public $comments;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($comments)
    {
        $this->comments = $comments;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('m4-comment::components.front-list-comment');
    }
}
