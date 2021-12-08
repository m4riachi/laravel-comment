<?php

namespace M4riachi\LaravelComment\Tests\Component;

use Illuminate\Foundation\Testing\RefreshDatabase;
use M4riachi\LaravelComment\Actions\MakeCommentRecursiveArrayAction;
use M4riachi\LaravelComment\Models\Comment;
use M4riachi\LaravelComment\Tests\TestCase;


class FrontComponentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_front_list_comment_component()
    {
        Comment::factory(2)->create();
        Comment::factory(5)->create();
        Comment::factory(6)->create();

        $comments = Comment::linkComment("/")->get();

        $new_ar = [];

        foreach ($comments->toArray() as $v) {
            $new_ar = MakeCommentRecursiveArrayAction::execute($new_ar, $v);
        }

        $this->blade('<x-m4-comment-front-list-comment :comments="$comments"/>', ['comments' => $new_ar])
            ->assertsee('Replay')
            ->assertsee($comments->first()->user_name);
    }

    public function test_front_list_component() {
        $this->blade('<x-m4-comment-front-list />')
            ->assertsee('No comment yet, be the first');

        Comment::factory(5)->create();

        $comments = Comment::linkComment("/")->get();

        $this->blade('<x-m4-comment-front-list />')
            ->assertsee('Replay')
            ->assertsee($comments->first()->user_name);
    }

    public function test_front_bloc_component() {
        $this->blade('<x-m4-comment-front-bloc />')
            ->assertsee('No comment yet, be the first');

        Comment::factory(5)->create();

        $comments = Comment::linkComment("/")->get();

        $this->blade('<x-m4-comment-front-list />')
            ->assertsee('Replay')
            ->assertsee($comments->first()->user_name);
    }

    public function test_front_javascript_component() {
        $this->blade('<x-m4-comment-front-javascript />')
            ->assertsee('replayComment');
    }

    public function test_front_form_component() {
        $this->blade('<x-m4-comment-front-form />')
            ->assertsee('formComment');
    }
}

