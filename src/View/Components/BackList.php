<?php

namespace M4riachi\LaravelComment\View\Components;

use Illuminate\View\Component;
use M4riachi\LaravelComment\Models\Comment;

class BackList extends Component
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

        return view('m4-comment::components.back-list', [
            'comments' => Comment::withUser()->orderBy('id', 'desc')->paginate()
        ]);
    }
}
