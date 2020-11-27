<?php

namespace SmallRuralDog\AdminDog\Components;

use Closure;
use SmallRuralDog\AdminDog\AdminJsonBuilder;
use SmallRuralDog\AdminDog\Events\EventListener;

/**
 * Class BaseComponent
 * @package SmallRuralDog\AdminDog\Components
 */
class BaseComponent extends AdminJsonBuilder
{
    protected $componentName = "";


    /**
     * Sets the name of the render component
     * @param string $componentName
     * @return $this
     */
    public function componentName(string $componentName)
    {
        $this->componentName = $componentName;
        return $this;
    }

    /**
     * 组件插槽
     * Add component slots or child elements
     * @param BaseComponent|Closure|string $slot
     * @param string|null $name 插槽名称
     * @return $this
     */
    public function slot($slot, $name = null)
    {

        if ($slot instanceof Closure) {
            $slot = call_user_func($slot);
            abort_if(empty($slot), 400, "The content cannot be empty");
        }

        if (empty($name)) {
            $this->children[] = $slot;
        } else {
            $this->slots[$name] = $slot;
        }

        return $this;
    }

    /**
     * 设置组件class名称
     * Set component class
     * @param $class
     * @return $this
     */
    public function class($class)
    {
        $this->class = $class;
        return $this;
    }

    /**
     * 设置组件内置样式
     * Set component style
     * @param $style
     * @return $this
     */
    public function style($style)
    {
        $this->style = $style;
        return $this;
    }

    /**
     * 设置组件属性
     * @param $name
     * @param bool $value
     * @return $this
     */
    public function attr($name, $value = true)
    {
        $this->$name = $value;
        return $this;
    }

    /**
     * 设置数据prop
     * Set component props
     * @param $name
     * @param bool $value
     * @return $this
     */
    public function prop($name, $value = true)
    {
        $this->props[$name] = $value;
        return $this;
    }

    /**
     * 设置组件value属性
     * @param $value
     * @return $this
     */
    public function value($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * 添加数据事件监听，多次调用可同时监听不同事件
     * Set component listening
     * @param EventListener|Closure $listener
     * @return $this
     */
    public function addEventListener($listener)
    {
        if ($listener instanceof Closure) {

            $eventListener = EventListener::make();

            call_user_func($listener, $eventListener);

            $this->listener[] = $eventListener;
        } else {
            $this->listener[] = $listener;
        }

        return $this;
    }


    public function __set($name, $value)
    {
        $this->$name = $value;
        return $this;
    }

}
