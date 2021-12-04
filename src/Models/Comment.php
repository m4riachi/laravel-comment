<?php

namespace M4riachi\LaravelComment\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'm4_comments';
    protected $fillable = [
        'user_name', 'user_email', 'comment', 'url_path', 'url_query', 'user_id', 'status'
    ];
}
