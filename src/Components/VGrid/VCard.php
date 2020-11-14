<?php


namespace SmallRuralDog\AdminDog\Components\VGrid;


use SmallRuralDog\AdminDog\Components\BaseComponent;

class VCard extends BaseComponent
{

    protected $componentName = 'VCardPro';

    public static function make()
    {
        return new VCard();
    }

}
