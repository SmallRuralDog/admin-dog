<?php

namespace SmallRuralDog\AdminDog\Traits\Component;

use Closure;
use SmallRuralDog\AdminDog\Events\ThenEvent;

trait OnThen
{
    /**
     * 请求成功事件
     * Component event
     * @param Closure $closure
     * @return $this
     */
    public function onThen(Closure $closure)
    {
        $event = ThenEvent::make();

        call_user_func($closure, $event);

        $this->events['then'] = $event;
        return $this;
    }
}
