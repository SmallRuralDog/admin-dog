<?php

namespace SmallRuralDog\AdminDog\Components\VCheckbox;

use SmallRuralDog\AdminDog\Components\BaseComponent;
use SmallRuralDog\AdminDog\Traits\Component\OnChange;
use SmallRuralDog\AdminDog\Traits\Component\Rules;
use SmallRuralDog\AdminDog\Traits\Component\VModel;

class VCheckbox extends BaseComponent
{
    use Rules,VModel,OnChange;

    protected $componentName = 'VCheckboxPro';

    public static function make()
    {
        return new VCheckbox();
    }
}
