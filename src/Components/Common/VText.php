<?php

namespace SmallRuralDog\AdminDog\Components\Common;

use SmallRuralDog\AdminDog\Components\BaseComponent;

class VText extends BaseComponent
{
    protected $componentName = "VTextProx";
    protected $text;

    /**
     * VText constructor.
     * @param $text
     */
    public function __construct($text)
    {
        $this->text = $text;
    }


    public static function make(string $text)
    {
        return new VText($text);
    }
}
