<?php

namespace SmallRuralDog\AdminDog\Components\VForm;

use SmallRuralDog\AdminDog\Components\BaseComponent;

class VForm extends BaseComponent
{

    protected $componentName = 'VFormPro';

    public static function make()
    {
        return new VForm();
    }

}
