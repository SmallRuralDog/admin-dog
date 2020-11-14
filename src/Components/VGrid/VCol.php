<?php


namespace SmallRuralDog\AdminDog\Components\VGrid;


use SmallRuralDog\AdminDog\Components\BaseComponent;

class VCol extends BaseComponent
{

    protected $componentName = 'VColPro';

    public static function make()
    {
        return new VCol();
    }

}
