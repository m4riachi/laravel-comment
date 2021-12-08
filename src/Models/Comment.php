<?php

namespace M4riachi\LaravelComment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use M4riachi\LaravelComment\Database\Factories\CommentFactory;
use M4riachi\LaravelComment\Enums\CommentStatusEnum;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'm4_comments';
    protected $fillable = [
        'user_name', 'user_email', 'comment', 'url_path', 'url_query', 'user_id', 'status', 'm4_comment_id'
    ];

    protected static function newFactory()
    {
        return CommentFactory::new();
    }

    public function user() {
        return $this->belongsTo(config('m4-comment.user_class', '\App\Models\User'));
    }

    public function scopeLinkComment($query, $path) {
        $query = $query
            ->where('url_path', $path)
            ->where('status', CommentStatusEnum::published())
            ->orderBy('m4_comment_id', 'asc')
            ->orderBy('id', 'asc');

        if (config('m4-comment.with_url_query', false)) {
            $query = $query->where('url_query', $_SERVER['QUERY_STRING']);
        }

        return $query;
    }

    public function scopeWithUser($query) {
        $userClass = config('m4-comment.user_class', '\App\Models\User');

        if (class_exists($userClass))
            return $query->with('user');

        return $query;
    }
}
