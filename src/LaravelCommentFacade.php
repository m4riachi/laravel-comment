<?php

namespace M4riachi\LaravelComment;

use Illuminate\Support\Facades\Facade;

/**
 * @see \M4riachi\LaravelComment\Skeleton\SkeletonClass
 */
class LaravelCommentFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-comment';
    }
}
