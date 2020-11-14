<?php

namespace SmallRuralDog\AdminDog\Components\VIcon;

use SmallRuralDog\AdminDog\Components\BaseComponent;

class VIcon extends BaseComponent
{

    protected $componentName = 'VIconPro';

    public static function make()
    {
        return new VIcon();
    }
}
