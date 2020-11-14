<?php

namespace SmallRuralDog\AdminDog\Components\VGrid;

use SmallRuralDog\AdminDog\Components\BaseComponent;

/**
 * Class VContainer
 * @package SmallRuralDog\AdminDog\Components\VGrid
 */
class VContainer extends BaseComponent
{
    protected $componentName = "VContainerPro";


    public static function make()
    {
        return new VContainer();
    }


}
