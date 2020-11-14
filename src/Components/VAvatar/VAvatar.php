<?php

namespace SmallRuralDog\AdminDog\Components\VAvatar;

use SmallRuralDog\AdminDog\Components\BaseComponent;

class VAvatar extends BaseComponent
{

    protected $componentName = 'VAvatarPro';

    public static function make()
    {
        return new VAvatar();
    }
}
