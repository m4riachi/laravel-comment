<?php

namespace M4riachi\LaravelComment\Tests;

use M4riachi\LaravelComment\LaravelCommentServiceProvider;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;

class TestCase extends \Orchestra\Testbench\TestCase
{
    use InteractsWithViews;
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate',
            ['--database' => 'testbench'])->run();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelCommentServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        include_once __DIR__ . '/../database/migrations/create_m4_comment_table.php.stub';

        // run the up() method of that migration class
        (new \CreateM4CommentTable)->up();
    }
}
