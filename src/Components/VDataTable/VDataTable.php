<?php

namespace SmallRuralDog\AdminDog\Components\VDataTable;

use SmallRuralDog\AdminDog\Components\BaseComponent;

class VDataTable extends BaseComponent
{
    protected $componentName = 'VDataTablePro';


    public static function make()
    {
        return new static();
    }
}
