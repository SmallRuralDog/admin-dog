<?php

namespace SmallRuralDog\AdminDog\Components\VCard;

use SmallRuralDog\AdminDog\Components\BaseComponent;

class VCardSubtitle extends BaseComponent
{
    protected $componentName = 'VCardSubtitlePro';

    public static function make()
    {
        return new static();
    }

}
