<?php

namespace M4riachi\LaravelComment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use M4riachi\LaravelComment\Actions\RecaptchaVerifyingUserResponseAction;
use M4riachi\LaravelComment\Http\Requests\CommentRequest;
use M4riachi\LaravelComment\Models\Comment;

class CommentController extends Controller {
    public function save(CommentRequest $request) {
        $data = $request->safe()->only([
            'user_name', 'user_email', 'comment', 'url_path', 'url_query', 'user_id', 'status'
        ]);

        Comment::create($data);

        return back()->with('status', 'success');
    }
}
