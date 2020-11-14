<?php

namespace SmallRuralDog\AdminDog;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SmallRuralDog\AdminPro\AdminDog
 */
class AdminDogFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'admin-dog';
    }
}
