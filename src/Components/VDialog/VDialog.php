<?php

namespace SmallRuralDog\AdminDog\Components\VDialog;

use SmallRuralDog\AdminDog\Components\BaseComponent;
use SmallRuralDog\AdminDog\Traits\Component\VModel;

class VDialog extends BaseComponent
{
    use VModel;
    protected $componentName = 'VDialogPro';


    public static function make()
    {
        return new static();
    }

}
