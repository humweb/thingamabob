<?php

use Humweb\Thingamabob\Contracts\Widget;
use Humweb\Thingamabob\Exceptions\WidgetNotFound;
use Humweb\Thingamabob\Facades\Widgets;
use Humweb\Thingamabob\Tests\Stubs\NewsWidget;
use Humweb\Thingamabob\Tests\Stubs\StatsWidget;

it('can register widget', function () {
    Widgets::register('news', new NewsWidget());
    expect(Widgets::get('news'))->toBeInstanceOf(Widget::class);
    expect(Widgets::get('news')->component)->toEqual('NewsWidget');
});

it('can check if widget exists', function () {
    Widgets::register('news', new NewsWidget());
    expect(Widgets::has('news'))->toBeTrue();
    expect(Widgets::has('blog'))->toBeFalse();
});

it('can generate title from component name', function () {
    Widgets::register('news', new NewsWidget());
    expect(Widgets::get('news')->getTitle())->toEqual('News Widget');
});

it('can get title from widget', function () {
    Widgets::register('stats', new StatsWidget());
    expect(Widgets::get('stats')->getTitle())->toEqual('Stats Count');
});

it('can list widget', function () {
    Widgets::register('news', new NewsWidget());
    $response = $this->get(route('widgets.list'))->assertJsonStructure([
        '*' => [
            'id', 'component'
        ]
    ]);
});

it('can return data from controller', function () {
    Widgets::register('news', new NewsWidget());
    $response = $this->get(route('widgets.show', 'news'))->assertJsonStructure([
        'news' => [
            '*' => ['title'],
        ]
    ]);
});

it('can return error when widget not found', function () {
    Widgets::register('news', new NewsWidget());
    $response = $this->get(route('widgets.show', 'blog'))->assertJsonStructure([
        'status',
        'message'
    ]);
});

it('can throw exception when widget not found', function () {
    Widgets::register('news', new NewsWidget());
    Widgets::get('blog');
})->throws(WidgetNotFound::class);
