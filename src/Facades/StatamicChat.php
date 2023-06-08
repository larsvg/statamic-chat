<?php

namespace Larsvg\StatamicChat\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Larsvg\StatamicChat\StatamicChat
 */
class StatamicChat extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Larsvg\StatamicChat\StatamicChat::class;
    }
}
