<?php

namespace SmallRuralDog\AdminDog\Traits\Component;

use Closure;
use SmallRuralDog\AdminDog\Events\ClickEvent;

trait OnClick
{


    /**
     * Component click event
     * @param Closure $click
     * @return $this
     */
    public function onClick(Closure $click)
    {
        $clickEvent = ClickEvent::make();

        call_user_func($click, $clickEvent);

        $this->events['click'] = $clickEvent;
        return $this;
    }
}
