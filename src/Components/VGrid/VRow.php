<?php


namespace SmallRuralDog\AdminDog\Components\VGrid;


use SmallRuralDog\AdminDog\Components\BaseComponent;

class VRow extends BaseComponent
{

    protected $componentName = 'VRowPro';

    public static function make()
    {
        return new VRow();
    }

}
