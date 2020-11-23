<?php

namespace SmallRuralDog\AdminDog\Traits\Component;

use Closure;
use SmallRuralDog\AdminDog\Events\CatchEvent;

trait OnCatch
{


    /**
     * 请求失败事件
     * Component event
     * @param Closure $catch
     * @return $this
     */
    public function onCatch(Closure $catch)
    {
        $event = CatchEvent::make();
        call_user_func($catch, $event);
        $this->events['catch'] = $event;
        return $this;
    }
}
