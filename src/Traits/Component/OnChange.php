<?php

namespace SmallRuralDog\AdminDog\Traits\Component;

use Closure;
use SmallRuralDog\AdminDog\Events\ChangeEvent;
use SmallRuralDog\AdminDog\Events\ClickEvent;

trait OnChange
{
    /**
     * onChange事件
     * Component change event
     * @param Closure $closure
     * @return $this
     */
    public function onChange(Closure $closure)
    {
        $event = ChangeEvent::make();

        call_user_func($closure, $event);

        $this->events['change'] = $event;
        return $this;
    }
}
