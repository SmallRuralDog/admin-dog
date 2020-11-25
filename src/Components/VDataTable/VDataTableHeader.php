<?php


namespace SmallRuralDog\AdminDog\Components\VDataTable;


use SmallRuralDog\AdminDog\Components\BaseComponent;

class VDataTableHeader extends BaseComponent
{
    protected $componentName = 'VDataTableHeaderPro';

    public static function make()
    {
        return new static();
    }

}
