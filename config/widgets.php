<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Base route
    |--------------------------------------------------------------------------
    |
    | This is the URI path where the widget data will be accessible from. Feel free
    | to change this path to anything you like.
    |
    */
    'route'       => '/api/widgets',

    /*
    |--------------------------------------------------------------------------
    | Middleware for internal routing
    |--------------------------------------------------------------------------
    |
    | You may add middlewares to restrict the internal routess
    |
    */
    'middleware'  => [],


    /*
    |--------------------------------------------------------------------------
    | Assets path
    |--------------------------------------------------------------------------
    |
    | This path is where you want to publish widgets from other packages.
    |
    */
    'assets_path' => resource_path('js/Widgets/'),

];
