<?php

namespace SmallRuralDog\AdminDog\Traits\Component;

use Closure;
use SmallRuralDog\AdminDog\Events\RequestingEvent;

trait OnRequesting
{
    /**
     * 请求中事件
     * Component click event
     * @param Closure $closure
     * @return $this
     */
    public function onRequesting(Closure $closure)
    {
        $event = RequestingEvent::make();

        call_user_func($closure, $event);

        $this->events['requesting'] = $event;
        return $this;
    }
}
