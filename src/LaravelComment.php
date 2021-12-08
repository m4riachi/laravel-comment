<?php

namespace M4riachi\LaravelComment;

use M4riachi\LaravelComment\Models\Comment;

class LaravelComment
{
    public static function commentModel() {
        return Comment::query();
    }
}
