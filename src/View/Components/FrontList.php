<?php

namespace M4riachi\LaravelComment\View\Components;

use Illuminate\View\Component;
use M4riachi\LaravelComment\Models\Comment;
use Illuminate\Http\Request;
use M4riachi\LaravelComment\Actions\MakeCommentRecursiveArrayAction;

class FrontList extends Component
{
    public $comments;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->url_query = $_SERVER['QUERY_STRING'] ?? null;

        $comment = Comment::query()
            ->where('url_path', $request->path())
            ->with('user')
            ->orderBy('m4_comment_id', 'asc')
            ->orderBy('id', 'asc')
            ->get()->toArray();

        $new_ar = [];

        foreach ($comment as $v) {
            $new_ar = MakeCommentRecursiveArrayAction::execute($new_ar, $v);
        }

        $this->comments = $new_ar;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('m4-comment::components.front-list');
    }
}
