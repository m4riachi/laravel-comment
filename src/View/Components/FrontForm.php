<?php

namespace M4riachi\LaravelComment\View\Components;

use Illuminate\View\Component;
use Illuminate\Http\Request;

class FrontForm extends Component
{
    public $url_path, $url_query;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->url_query = $_SERVER['QUERY_STRING'] ?? null;
        $this->url_path = $request->path();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('m4-comment::components.front-form', [
            'guestUser' => config('m4-comment.guest-user', true)
        ]);
    }
}
