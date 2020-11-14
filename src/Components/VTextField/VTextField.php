<?php

namespace SmallRuralDog\AdminDog\Components\VTextField;

use SmallRuralDog\AdminDog\Components\BaseComponent;

class VTextField extends BaseComponent
{

    protected $componentName = 'VTextFieldPro';

    public static function make()
    {
        return new VTextField();
    }

}
