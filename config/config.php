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
        'api_middleware' => ['api', 'adminDog'],
    ],
    'auth' => [
        'controller' => '',
        'guard' => 'admin',
        'guards' => [
            'admin' => [
                'driver' => 'session',
                'provider' => 'admin',
            ],
        ],
        'providers' => [
            'admin' => [
                'driver' => 'eloquent',
                'model' => SmallRuralDog\AdminDog\Models\AdminDogUser::class,
            ],
        ],
        // Add "remember me" to login form
        'remember' => true,
        // Redirect to the specified URI when user is not authorized.
        'redirect_to' => 'auth/login',
        // The URIs that should be excluded from authorization.
        'excepts' => [
            'auth/login',
            'auth/logout',
            '_handle_action_',
        ],
    ],
];
