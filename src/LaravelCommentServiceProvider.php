<?php

namespace M4riachi\LaravelComment;

use Illuminate\Support\ServiceProvider;
use M4riachi\LaravelComment\View\Components\FrontBloc;
use M4riachi\LaravelComment\View\Components\FrontForm;
use M4riachi\LaravelComment\View\Components\FrontList;

class LaravelCommentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-comment');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'm4-comment');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewComponentsAs('m4-comment', [
            FrontBloc::class,
            FrontForm::class,
            FrontList::class,
        ]);

        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('m4-comment.php'),
        ], 'm4-config');

        if (! class_exists('CreateM4CommentTable')) {
            $this->publishes([
                __DIR__.'/../database/migrations/create_m4_comment_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_m4_comment_table.php'),
            ], 'm4-migrations');
        }

        if ($this->app->runningInConsole()) {
            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-comment'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-comment'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-comment'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-comment');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-comment', function () {
            return new LaravelComment;
        });
    }
}
