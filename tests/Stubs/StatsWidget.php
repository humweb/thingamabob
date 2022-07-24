<?php

namespace Humweb\Thingamabob\Tests\Stubs;

use Humweb\Thingamabob\AbstractWidget;
use Humweb\Thingamabob\Contracts\Widget;
use Illuminate\Http\Request;

class StatsWidget extends AbstractWidget implements Widget
{
    public string $title = 'Stats Count';
    public string $component = 'StatsWidget';

    public function data(Request $request): array
    {
        return [
            'stats' => [
                ['count' => [1, 2, 3, 4, 5, 6]],
            ]
        ];
    }
}
