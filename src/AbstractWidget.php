<?php

namespace Humweb\Thingamabob;

use Illuminate\Support\Str;

abstract class AbstractWidget
{
    public string $title = '';
    public string $component = '';

    public function getTitle(): string
    {
        if (empty($this->title)) {
            return Str::title(str_replace('_', ' ', Str::snake($this->component)));
        }

        return $this->title;
    }
}
