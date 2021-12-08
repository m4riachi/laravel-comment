<?php

namespace M4riachi\LaravelComment\Tests\Component;

use Illuminate\Foundation\Testing\RefreshDatabase;
use M4riachi\LaravelComment\Actions\MakeCommentRecursiveArrayAction;
use M4riachi\LaravelComment\Models\Comment;
use M4riachi\LaravelComment\Tests\TestCase;


class BackComponentTest extends TestCase
{
    use RefreshDatabase;

    public function test_back_list_component() {
        $this->blade('<x-m4-comment-back-list />')
            ->assertsee('table table-striped table-bordered');

        Comment::factory(5)->create();

        $comments = Comment::get();

        $this->blade('<x-m4-comment-back-list />')
            ->assertsee($comments->first()->user_name);
    }
}

