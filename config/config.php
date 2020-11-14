<?php

/*
 *
 */
return [

    //后台开发目录
    'directory' => app_path('AdminDog'),
    'bootstrap' => app_path('AdminDog/bootstrap.php'),
    'logo' => '',
    'route' => [
        'domain' => null,
        'prefix' => env('ADMIN_PRO_ROUTE_PREFIX', 'admin-dog'),
        'api_prefix' => env('ADMIN_PRO_API_ROUTE_PREFIX', 'api-admin-dog'),
        'middleware' => ['web','AdminDog'],
    ]
];
