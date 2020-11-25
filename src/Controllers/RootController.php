<?php

namespace SmallRuralDog\AdminDog\Controllers;

use App\Http\Controllers\Controller;
use SmallRuralDog\AdminDog\AdminDog;
use SmallRuralDog\AdminDog\Components\VBtn\VBtn;
use SmallRuralDog\AdminDog\Models\AdminDogMenu;

class RootController extends Controller
{


    public function index()
    {
        return view('admin-dog::index');
    }

    public function empty()
    {
        return VBtn::make()->slot("404");
    }


    public function config()
    {

        $config = [
            'logo' => config('admin-dog.logo'),
            'apiRoot' => config('admin-dog.route.api_prefix'),
            'theme' => config('admin-dog.theme'),
        ];
        return response(
            view('admin-dog::js-config', ['config' => $config]),
            200,
            [
                'Content-Type' => 'application/javascript',
            ]
        );

    }


    public function init()
    {
        $user = \AdminDog::user();

        $menus = AdminDogMenu::query()->orderByDesc('order')->get()->toArray();

        $res = [
            'user' => $user,
            'menus' => AdminDogMenu::arr2tree($menus)
        ];

        return \AdminDog::response($res);

    }

    public function scripts()
    {

        $js = '';
        foreach (AdminDog::scripts() as $path) {
            $js .= file_get_contents($path);
        }
        return response($js,
            200,
            [
                'Content-Type' => 'application/javascript',
            ]
        );
    }

}
