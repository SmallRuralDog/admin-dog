<?php

namespace SmallRuralDog\AdminDog\Traits\Component;

use Closure;
use SmallRuralDog\AdminDog\Events\ChangeEvent;
use SmallRuralDog\AdminDog\Events\ClickEvent;

trait OnChange
{
    /**
     * Component change event
     * @param Closure $change
     * @return $this
     */
    public function onChange(Closure $change)
    {
        $changeEvent = ChangeEvent::make();

        call_user_func($change, $changeEvent);

        $this->events['change'] = $changeEvent;
        return $this;
    }
}
