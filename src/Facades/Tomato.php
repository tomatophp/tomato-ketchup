<?php

namespace TomatoPHP\TomatoKetchup\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array resources()
 * @method static array loadResources()
 * @method static array loadMenus()
 *
 * @see \Tomatophp\TomatoKetchup\Services\TomatoCore
 */
class Tomato extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'tomato';
    }
}
