<?php

namespace M4riachi\LaravelComment\Tests\Unit;

use M4riachi\LaravelComment\Actions\MakeCommentRecursiveArrayAction;
use M4riachi\LaravelComment\Tests\TestCase;

class ActionsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_action_make_recursive_array()
    {
        $comment = [
            ['id' => 1, 'm4_comment_id' => null],
            ['id' => 2, 'm4_comment_id' => null],
            ['id' => 3, 'm4_comment_id' => 1],
            ['id' => 4, 'm4_comment_id' => 3],
            ['id' => 5, 'm4_comment_id' => 4],
        ];

        $new_ar = [];

        foreach ($comment as $v) {
            $new_ar = MakeCommentRecursiveArrayAction::execute($new_ar, $v);
        }

        $this->assertEquals($new_ar[1]['id'], 2);
        $this->assertEquals($new_ar[0]['sub'][0]['sub'][0]['sub'][0]['id'], 5);
    }
}
