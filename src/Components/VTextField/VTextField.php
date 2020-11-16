<?php

namespace SmallRuralDog\AdminDog\Components\VTextField;

use SmallRuralDog\AdminDog\Components\BaseComponent;
use SmallRuralDog\AdminDog\Traits\Component\Rules;

class VTextField extends BaseComponent
{
    use Rules;

    protected $componentName = 'VTextFieldPro';

    public static function make()
    {
        return new VTextField();
    }

}
