<?php

namespace SmallRuralDog\AdminDog\Traits\Component;

use Closure;
use SmallRuralDog\AdminDog\Events\ClickEvent;

/**
 * 可点击
 * Trait OnClick
 * @package SmallRuralDog\AdminDog\Traits\Component
 */
trait OnClick
{


    /**
     * 点击事件
     * Component click event
     * @param Closure $closure
     * @return $this
     */
    public function onClick(Closure $closure)
    {
        $event = ClickEvent::make();

        call_user_func($closure, $event);

        $this->events['click'] = $event;
        return $this;
    }
}
