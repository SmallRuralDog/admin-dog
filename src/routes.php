<?php

use Illuminate\Routing\Router;
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
    'middleware' => config('admin-dog.route.middleware'),
], function (Router $router) {
    $router->get('config.js', RootController::class . "@config")->name('admin-dog.config');
    $router->get('adminDog.js', RootController::class . "@scripts")->name('admin-dog.scripts');


    $router->get('auth/login', \SmallRuralDog\AdminDog\Controllers\AuthController::class . "@login");

});
