<?php
namespace M4riachi\LaravelComment\Database\Factories;

use M4riachi\LaravelComment\Enums\CommentStatusEnum;
use M4riachi\LaravelComment\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'user_id' => null,
            'm4_comment_id' => optional(Comment::inRandomOrder()->first())->id,
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->email,
            'url_path' => "/",
            'url_query' => null,
            'comment' => $this->faker->paragraph(3, true),
            'status' => CommentStatusEnum::published(),
        ];
    }
}
