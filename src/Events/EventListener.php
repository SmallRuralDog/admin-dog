<?php


namespace SmallRuralDog\AdminDog\Events;


use SmallRuralDog\AdminDog\AdminJsonBuilder;

class EventListener extends AdminJsonBuilder
{
    protected $listener;
    protected $listenerCode;
    public static function make()
    {
        return new EventListener();
    }

    /**
     * 设置监听事件名称
     * Sets the listener event name
     * @param mixed $listener
     * @return $this
     */
    public function listener($listener)
    {
        $this->listener = $listener;
        return $this;
    }

    /**
     * 设置事件代码
     * Set event code
     * 基础代码示例，_this 对象为当期组件的 this，_emit 对象为触发事件组件的this
     * Base code example, _this object is the this of the current component, _emit object is the this of the triggering event component
     * ===========================================
     * <<<JS
     * console.log(_this)
     * console.log(_emit)
     * JS;
     * ===========================================
     *
     * @param mixed $listenerCode
     * @return $this
     */
    public function listenerCode($listenerCode)
    {
        $this->listenerCode = $listenerCode;
        return $this;
    }



}
