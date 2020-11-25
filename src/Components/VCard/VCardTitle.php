<?php

namespace SmallRuralDog\AdminDog\Components\VCard;

use SmallRuralDog\AdminDog\Components\BaseComponent;

class VCardTitle extends BaseComponent
{
    protected $componentName = 'VCardTitlePro';

    public static function make()
    {
        return new static();
    }

}
