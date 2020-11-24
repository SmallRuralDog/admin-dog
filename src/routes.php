<?php

use Illuminate\Routing\Router;
use SmallRuralDog\AdminDog\Controllers\AuthController;
use SmallRuralDog\AdminDog\Controllers\RootController;

Route::group([
    'domain' => config('admin-dog.route.domain'),
    'prefix' => config('admin-dog.route.prefix'),
    'middleware' => config('admin-dog.route.middleware'),
], function (Router $router) {
    $router->get('/', RootController::class . "@index")->name('admin-dog.root');
});
Route::group([
    'domain' => config('admin-dog.route.domain'),
    'prefix' => config('admin-dog.route.api_prefix'),
    'middleware' => config('admin-dog.route.api_middleware'),
], function (Router $router) {
    $router->get('config.js', RootController::class . "@config")->name('admin-dog.config');
    $router->get('adminDog.js', RootController::class . "@scripts")->name('admin-dog.scripts');
    $router->any('auth/login', AuthController::class . "@login");
    $router->any('auth/loginPost', AuthController::class . "@loginPost")->name('admin-dog.login-post');
    $router->group([
        'middleware' => 'adminDog.auth',
    ], function (Router $router) {
        $router->any('init', RootController::class . '@init');
        $router->get('auth/logout', AuthController::class . '@logout')->name('admin.logout');

        $router->get('system/menus', \SmallRuralDog\AdminDog\Controllers\MenuController::class . '@index');
        $router->get('system/users', \SmallRuralDog\AdminDog\Controllers\UserController::class . '@index');

    });


});
