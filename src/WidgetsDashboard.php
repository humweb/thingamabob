<?php

namespace Humweb\Thingamabob;

use Humweb\Thingamabob\Models\DashboardWidgets;

class WidgetsDashboard
{
    /**
     * @param  int     $userId
     * @param  array   $widgets
     * @param  string  $name
     *
     * @return mixed
     */
    public function save(int $userId, array $widgets = [], string $name = 'default')
    {
        return DashboardWidgets::updateOrCreate(
            ['user_id' => $userId, 'name' => $name],
            ['widgets' => $widgets]
        );
    }

    /**
     * @param  int     $userId
     * @param  string  $name
     *
     * @return mixed
     */
    public function get(int $userId, string $name = 'default')
    {
        return DashboardWidgets::where(['user_id' => $userId, 'name' => $name])->first();
    }
}
