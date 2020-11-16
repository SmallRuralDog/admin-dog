<?php

namespace SmallRuralDog\AdminDog\Events;

use SmallRuralDog\AdminDog\AdminJsonBuilder;

class BaseEvent extends AdminJsonBuilder
{
    public static function make()
    {
        return new static;
    }


    /**
     * 触发事件
     * Triggering event
     * @param string $listener
     */
    public function emit(string $listener)
    {
        $this->emits[] = $listener;
    }

    /**
     * 执行js代码
     * Execute js code
     Base code example, _this object is the this of the current component
     * ===========================================
     * <<<JS
     * console.log(_this)
     * JS;
     * ===========================================
     * @param string $jsCode
     */
    public function jsCode(string $jsCode)
    {
        $this->jsCode = $jsCode;
    }


    public function __set($name, $value)
    {
        $this->$name = $value;
        return $this;
    }

}
