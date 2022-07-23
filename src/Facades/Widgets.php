<?php

namespace Humweb\Thingamabob\Facades;

use Humweb\Thingamabob\Contracts\WidgetManager;
use Illuminate\Support\Facades\Facade;

/**
 * @see \Humweb\Thingamabob\Widgets
 */
class Widgets extends Facade
{
    protected static function getFacadeAccessor()
    {
        return WidgetManager::class;
    }
}
