<?php

namespace SmallRuralDog\AdminDog\Components\VToolbar;

use SmallRuralDog\AdminDog\Components\BaseComponent;

class VToolbar extends BaseComponent
{
    protected $componentName = 'VToolbarPro';

    public static function make()
    {
        return new static();
    }

}
