<?php

use Humweb\Thingamabob\Http\Controllers\WidgetController;

Route::middleware(config('widgets.middleware'))
    ->controller(WidgetController::class)
    ->group(function () {
        Route::get(rtrim(config('widgets.route'), '/').'/list', 'widgetList')->name('widgets.list');
        Route::get(rtrim(config('widgets.route'), '/').'/{widget}', 'show')->name('widgets.show');
    });
