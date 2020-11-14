<?php

namespace SmallRuralDog\AdminDog\Components\VCheckbox;

use SmallRuralDog\AdminDog\Components\BaseComponent;

class VCheckbox extends BaseComponent
{

    protected $componentName = 'VCheckboxPro';

    public static function make()
    {
        return new VCheckbox();
    }
}
