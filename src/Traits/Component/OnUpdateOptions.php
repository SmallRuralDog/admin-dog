<?php

namespace SmallRuralDog\AdminDog\Traits\Component;

use Closure;
use SmallRuralDog\AdminDog\Events\CatchEvent;
use SmallRuralDog\AdminDog\Events\InputEvent;
use SmallRuralDog\AdminDog\Events\UpdateOptionsEvent;

trait OnUpdateOptions
{


    /**
     * Input事件
     * Component event
     * @param Closure $closure
     * @return $this
     */
    public function onUpdateOptions(Closure $closure)
    {
        $event = UpdateOptionsEvent::make();
        call_user_func($closure, $event);
        $this->events['updateOptions'] = $event;
        return $this;
    }
}
