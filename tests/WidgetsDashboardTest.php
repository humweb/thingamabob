<?php

use Humweb\Thingamabob\Facades\Widgets;
use Humweb\Thingamabob\Models\DashboardWidgets;
use Humweb\Thingamabob\Tests\Stubs\NewsWidget;
use Humweb\Thingamabob\Tests\Stubs\StatsWidget;
use Humweb\Thingamabob\WidgetsDashboard;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    Widgets::register('news', new NewsWidget());
    Widgets::register('stats', new StatsWidget());
    $this->dashboard = new WidgetsDashboard();
});

it('can save default widget', function () {
    $this->dashboard->save(1, [
        ['name' => 'news'],
    ]);

    $this->assertDatabaseHas('dashboard_widgets', [
        'user_id' => 1,
        'name' => 'default',
    ]);
});
it('can update default widget', function () {
    $this->dashboard->save(1, [
        ['name' => 'news'],
    ]);

    $this->assertDatabaseHas('dashboard_widgets', [
        'user_id' => 1,
        'name' => 'default',
    ]);

    $this->dashboard->save(1, [
        ['name' => 'news'],
        ['name' => 'stats'],
    ]);

    $this->assertDatabaseCount('dashboard_widgets', 1);
    $dashboard = $this->dashboard->get(1, 'default');
    expect($dashboard->widgets[0])->toEqual(['name' => 'news']);
    expect($dashboard->widgets[1])->toEqual(['name' => 'stats']);
});

it('can get default dashboard widgets', function () {
    $this->dashboard->save(1, [
        ['name' => 'news'],
    ]);

    $dashboard = $this->dashboard->get(1, 'default');
    expect($dashboard)->toBeInstanceOf(DashboardWidgets::class);
    expect($dashboard->widgets[0])->toEqual(['name' => 'news']);
});
