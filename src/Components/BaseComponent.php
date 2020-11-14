<?php

namespace SmallRuralDog\AdminDog\Components;

use Closure;
use SmallRuralDog\AdminDog\AdminJsonBuilder;

/**
 * Class BaseComponent
 * @package SmallRuralDog\AdminDog\Components
 */
class BaseComponent extends AdminJsonBuilder
{
    protected $componentName = "";

    /**
     * @param string $componentName
     * @return $this
     */
    public function componentName(string $componentName)
    {
        $this->componentName = $componentName;
        return $this;
    }

    /**
     * @param BaseComponent|Closure|string $slot
     * @param string $name
     * @return $this
     */
    public function slot($slot, $name = 'default')
    {

        $slotName = $name;
        if (isset($this->slots) && data_get($this->slots, $name) != null && $name == 'default') {
            $slotName = "list-" . count($this->slots);
        }
        if ($slot instanceof Closure) {
            $slot = call_user_func($slot);
            abort_if(empty($slot), 400, "The content cannot be empty");
            $this->slots[$slotName] = $slot;
        } else if ($slot instanceof BaseComponent) {
            $this->slots[$slotName] = $slot;
        } else {// is String
            $this->slots = $slot;
        }
        return $this;
    }

    public function class($class)
    {
        $this->class = $class;
        return $this;
    }

    public function style($style)
    {
        $this->style = $style;
        return $this;
    }

    public function prop($name, $value=true)
    {
        $this->props[$name] = $value;
        return $this;
    }


    public function __set($name, $value)
    {
        $this->$name = $value;
        return $this;
    }

}
