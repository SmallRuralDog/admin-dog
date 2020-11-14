<?php

namespace SmallRuralDog\AdminDog\Controllers;

use App\Http\Controllers\Controller;
use SmallRuralDog\AdminDog\AdminDog;

class RootController extends Controller
{


    public function index()
    {
        return view('admin-dog::index');
    }


    public function config()
    {

        $config = [
            'logo' => config('admin-dog.logo'),
            'apiRoot' => url(config('admin-dog.route.api_prefix'))
        ];
        return response(
            view('admin-dog::js-config', ['config' => $config]),
            200,
            [
                'Content-Type' => 'application/javascript',
            ]
        );

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
