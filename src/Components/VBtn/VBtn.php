<?php


namespace SmallRuralDog\AdminDog\Components\VBtn;


use SmallRuralDog\AdminDog\Components\BaseComponent;

class VBtn extends BaseComponent
{

    protected $componentName = 'VBtnPro';

    public static function make()
    {
        return new VBtn();
    }

    /**
     * Event that is emitted when the component is clicked
     * @param string $function
     * @return $this
     */
    public function onClick(string $function)
    {
        $this->events['click'] = $function;
        return $this;
    }

}
