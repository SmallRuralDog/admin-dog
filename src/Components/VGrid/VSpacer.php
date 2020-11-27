<?php


namespace SmallRuralDog\AdminDog\Components\VGrid;


use SmallRuralDog\AdminDog\Components\BaseComponent;

class VSpacer extends BaseComponent
{
    protected $componentName = 'VSpacerPro';

    public static function make()
    {
        return new static();
    }

}
