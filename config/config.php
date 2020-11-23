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
        'prefix' => env('ADMIN_DOG_ROUTE_PREFIX', 'admin-dog'),
        'api_prefix' => env('ADMIN_DOG_API_ROUTE_PREFIX', 'api-admin-dog'),
        'middleware' => ['web', 'adminDog'],
        'api_middleware' => ['web', 'adminDog'],
    ],
    'auth' => [
        'controller' => '',
        'guard' => 'admin-dog',
        'guards' => [
            'admin-dog' => [
                'driver' => 'session',
                'provider' => 'admin-dog',
            ],
        ],
        'providers' => [
            'admin-dog' => [
                'driver' => 'eloquent',
                'model' => SmallRuralDog\AdminDog\Models\AdminDogUser::class,
            ],
        ],
        // Add "remember me" to login form
        'remember' => true,
    ],
];
