<?php


namespace SmallRuralDog\AdminDog\Components\VBtn;


use SmallRuralDog\AdminDog\Components\BaseComponent;
use SmallRuralDog\AdminDog\Traits\Component\OnClick;

class VBtn extends BaseComponent
{
    use OnClick;

    protected $componentName = 'VBtnPro';

    public static function make()
    {
        return new VBtn();
    }


}
