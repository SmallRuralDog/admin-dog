<?php

namespace SmallRuralDog\AdminDog;

use Illuminate\Support\Facades\Auth;
use SmallRuralDog\AdminDog\Models\AdminDogUser;
use SmallRuralDog\AdminDog\Traits\AdminDogBase;

class AdminDog
{
    use AdminDogBase;

    public static $scripts = [];


    public static function script($path)
    {
        static::$scripts[] = $path;

        return new static;
    }

    public static function scripts()
    {
        return static::$scripts;
    }


    public function bootstrap()
    {


        require config('admin-dog.bootstrap', $this->path('bootstrap.php'));
    }

    public function path($path = '')
    {
        return ucfirst(config('admin-dog.directory')) . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }


    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|null|AdminDogUser
     */
    public function user()
    {
        return $this->guard()->user();
    }

    public function guard()
    {
        $guard = config('admin-dog.auth.guard') ?: 'admin-dog';

        return Auth::guard($guard);
    }
}
