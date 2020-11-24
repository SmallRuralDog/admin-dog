<?php


namespace SmallRuralDog\AdminDog\Components\VAlert;

use SmallRuralDog\AdminDog\Components\BaseComponent;

class VAlert extends BaseComponent
{

    protected $componentName = 'VAlertPro';

    public static function make()
    {
        return new static();
    }
}
