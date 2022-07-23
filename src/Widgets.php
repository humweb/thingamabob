<?php

namespace Humweb\Thingamabob;

use Humweb\Thingamabob\Contracts\Widget;
use Humweb\Thingamabob\Contracts\WidgetManager;
use Humweb\Thingamabob\Exceptions\InvalidWidgetName;
use Humweb\Thingamabob\Exceptions\WidgetNotFound;


class Widgets implements WidgetManager
{
    public array $widgets = [];

    /**
     * @param  string  $id
     * @param  Widget  $widget
     *
     * @return $this
     * @throws InvalidWidgetName|\Throwable
     */
    public function register(string $id, Widget $widget): static
    {
        throw_if(str_contains($id, ' '), new InvalidWidgetName('Widget name cannot contain spaces.'));

        $this->widgets[$id] = $widget;

        return $this;
    }

    /**
     * @param  string  $widget
     *
     * @return Widget
     * @throws WidgetNotFound|\Throwable
     */
    public function get(string $widget): Widget
    {
        throw_if(!isset($this->widgets[$widget]), new WidgetNotFound('Widget "'.$widget.'" not found!'));

        return $this->widgets[$widget];
    }


    public function all(): array
    {
        return array_map(function ($key, $widget) {
            return [
                'id'        => $key,
                'component' => $widget->component
            ];
        }, array_keys($this->widgets), $this->widgets);
    }

    public function has($widget): bool
    {
        return isset($this->widgets[$widget]);
    }
}
