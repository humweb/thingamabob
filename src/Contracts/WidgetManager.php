<?php

namespace Humweb\Thingamabob\Contracts;

use Humweb\Thingamabob\Exceptions\WidgetNotFound;

interface WidgetManager
{
    public function has(string $widget): bool;

    /**
     * @param  string  $widget
     *
     * @return Widget
     * @throws WidgetNotFound
     */
    public function get(string $widget): Widget;
}
