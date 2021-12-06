<?php

namespace M4riachi\LaravelComment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use M4riachi\LaravelComment\Actions\RecaptchaVerifyingUserResponseAction;
use M4riachi\LaravelComment\Enums\CommentStatusEnum;
use M4riachi\LaravelComment\Http\Requests\CommentRequest;
use M4riachi\LaravelComment\Models\Comment;

class CommentController extends Controller
{
    public function save(CommentRequest $request)
    {
        $data = $request->safe()->only([
            'user_name', 'user_email', 'comment', 'url_path', 'url_query', 'user_id', 'status', 'm4_comment_id'
        ]);

        Comment::create($data);

        if (config('m4-comment.ajax.enable', true)) {
            return ['success' => true];
        }

        return back()->with('status', 'success');
    }

    public function delete(Comment $comment) {
        $comment->delete();

        return back()->with('status', 'success');
    }

    public function status(Comment $comment) {
        $comment->status = ($comment->status == CommentStatusEnum::pending()) ? CommentStatusEnum::published() : CommentStatusEnum::pending();
        $comment->save();

        return back()->with('status', 'success');
    }
}
