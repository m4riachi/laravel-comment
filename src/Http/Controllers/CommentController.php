<?php

namespace M4riachi\LaravelComment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController {
    public function index() {
        dd(2);
    }

    public function save(Request $request) {
        $guestUser = config('m4-comment.guest-user', true);
        if (!$guestUser && !Auth::check()) {
            abort(404);
        }

        $inputValidator = config('m4-comment.input-validator', [
            'name' => ['required', 'string', 'max:192'],
            'email' => ['required', 'string', 'email', 'max:192'],
            'comment' => ['required', 'string'],
        ]);
        $data = $request->validated($inputValidator);

        if (Auth::check()) {
            $data['user_id'] = auth()->user()->id;
        }

    }
}
