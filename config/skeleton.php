<?php

use VendorName\Skeleton\Http\Middleware\Authorize;

return [

    'enabled' => env('SKELETON_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Dashboard Domain
    |--------------------------------------------------------------------------
    |
    | This is the subdomain where Dashboard will be accessible from. If the
    | setting is null, Dashboard will reside under the same domain as the
    | application. Otherwise, this value will be used as the subdomain.
    |
    */

    'domain' => env('SKELETON_DOMAIN', null),

    /*
    |--------------------------------------------------------------------------
    | Dashboard Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Dashboard will be accessible from. Feel free
    | to change this path to anything you like. Note that the URI will not
    | affect the paths of its internal API that aren't exposed to users.
    |
    */

    'path' => env('SKELETON_PATH', 'skeleton'),

    /*
    |--------------------------------------------------------------------------
    | Dashboard Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to every Dashboard route, giving you
    | the chance to add your own middleware to this list or change any of
    | the existing middleware. Or, you can simply stick with this list.
    |
    */
    'middleware' => [
        'web',
        Authorize::class,
    ],
];
