<?php

namespace M4riachi\LaravelComment\View\Components;

use Illuminate\View\Component;

class FrontBloc extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('m4-comment::components.front-bloc');
    }
}
