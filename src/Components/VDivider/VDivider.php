<?php

namespace SmallRuralDog\AdminDog\Components\VDivider;

use SmallRuralDog\AdminDog\Components\BaseComponent;

class VDivider extends BaseComponent
{
    protected $componentName = 'VDividerPro';

    public static function make()
    {
        return new static();
    }

}
