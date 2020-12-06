<?php

namespace SmallRuralDog\AdminDog\Traits\Component;

use Closure;
use SmallRuralDog\AdminDog\Events\CatchEvent;
use SmallRuralDog\AdminDog\Events\InputEvent;

trait OnInput
{


    /**
     * Input事件
     * Component event
     * @param Closure $closure
     * @return $this
     */
    public function onInput(Closure $closure)
    {
        $event = InputEvent::make();
        call_user_func($closure, $event);
        $this->events['input'] = $event;
        return $this;
    }
}
