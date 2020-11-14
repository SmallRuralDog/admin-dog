<?php

namespace SmallRuralDog\AdminDog\Components\VChip;

use SmallRuralDog\AdminDog\Components\BaseComponent;

class VChip extends BaseComponent
{

    protected $componentName = 'VChipPro';

    public static function make()
    {
        return new VChip();
    }
}
