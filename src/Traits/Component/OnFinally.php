<?php

namespace SmallRuralDog\AdminDog\Traits\Component;

use Closure;
use SmallRuralDog\AdminDog\Events\FinallyEvent;
use SmallRuralDog\AdminDog\Events\ThenEvent;

trait OnFinally
{
    /**
     * 请求完成事件
     * Component click event
     * @param Closure $closure
     * @return $this
     */
    public function onFinally(Closure $closure)
    {
        $event = FinallyEvent::make();

        call_user_func($closure, $event);

        $this->events['finally'] = $event;
        return $this;
    }
}
