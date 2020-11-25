<?php

namespace SmallRuralDog\AdminDog\Components\VCard;

use SmallRuralDog\AdminDog\Components\BaseComponent;

class VCardText extends BaseComponent
{
    protected $componentName = 'VCardTextPro';

    public static function make()
    {
        return new static();
    }

}
