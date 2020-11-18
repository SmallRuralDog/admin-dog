<?php

namespace SmallRuralDog\AdminDog\Components\VTextField;

use SmallRuralDog\AdminDog\Components\BaseComponent;
use SmallRuralDog\AdminDog\Traits\Component\OnChange;
use SmallRuralDog\AdminDog\Traits\Component\Rules;
use SmallRuralDog\AdminDog\Traits\Component\VModel;

class VTextField extends BaseComponent
{
    use Rules,VModel,OnChange;

    protected $componentName = 'VTextFieldPro';

    public static function make()
    {
        return new VTextField();
    }

}
