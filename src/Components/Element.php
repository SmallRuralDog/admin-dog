<?php


namespace SmallRuralDog\AdminDog\Components;


use SmallRuralDog\AdminDog\Components\VGrid\VCard;

class Element extends BaseComponent
{
    protected $componentName = "VElementPro";

    protected $elementName;

    /**
     * Element constructor.
     * @param $elementName
     */
    public function __construct($elementName)
    {
        $this->elementName = $elementName;
    }


    public static function make(string $elementName)
    {
        return new Element($elementName);
    }

}
