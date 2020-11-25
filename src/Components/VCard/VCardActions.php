<?php

namespace SmallRuralDog\AdminDog\Components\VCard;

use SmallRuralDog\AdminDog\Components\BaseComponent;

class VCardActions extends BaseComponent
{
    protected $componentName = 'VCardActionsPro';

    public static function make()
    {
        return new static();
    }

}
