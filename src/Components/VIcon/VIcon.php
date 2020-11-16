<?php

namespace SmallRuralDog\AdminDog\Components\VIcon;

use SmallRuralDog\AdminDog\Components\BaseComponent;
use SmallRuralDog\AdminDog\Traits\Component\OnClick;

class VIcon extends BaseComponent
{
    use OnClick;

    protected $componentName = 'VIconPro';

    public static function make()
    {
        return new VIcon();
    }
}
