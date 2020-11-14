<?php

namespace SmallRuralDog\AdminDog;

class AdminDog
{

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

        self::script(__DIR__ . '/../resources/js/adminDogFunction.js');

        require config('admin-dog.bootstrap', $this->path('bootstrap.php'));
    }

    public function path($path = '')
    {
        return ucfirst(config('admin-dog.directory')) . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}
