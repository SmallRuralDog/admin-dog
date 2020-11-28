<?php

namespace SmallRuralDog\AdminDog\Components\Custom\Table;

use SmallRuralDog\AdminDog\Components\BaseComponent;

class Table extends BaseComponent
{
    protected $componentName = 'VAdminDogTablePro';

    public static function make()
    {
        return new static();
    }

}
