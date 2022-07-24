<?php

namespace Humweb\Thingamabob\Tests\Stubs;

use Humweb\Thingamabob\AbstractWidget;
use Humweb\Thingamabob\Contracts\Widget;
use Illuminate\Http\Request;

class NewsWidget extends AbstractWidget implements Widget
{
    public string $component = 'NewsWidget';

    public function data(Request $request): array
    {
        return [
            'news' => [
                ['title' => 'Breaking news'],
                ['title' => 'Tonight at 11pm'],
            ],
        ];
    }
}
