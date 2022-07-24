<?php

namespace Humweb\Thingamabob\Database\Factories;

use Humweb\Thingamabob\Models\DashboardWidgets;
use Illuminate\Database\Eloquent\Factories\Factory;


class WidgetsDashboardFactory extends Factory
{
    protected $model = DashboardWidgets::class;

    public function definition()
    {
        return [
            'user_id' => 1,
            'name'    => 'default',
            'widgets' => []
        ];
    }
}
