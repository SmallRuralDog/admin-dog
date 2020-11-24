<?php


namespace SmallRuralDog\AdminDog\Controllers;


use SmallRuralDog\AdminDog\Components\VBtn\VBtn;
use SmallRuralDog\AdminDog\Components\VDataTable\VDataTable;
use SmallRuralDog\AdminDog\Events\ClickEvent;

class UserController extends AdminDogController
{
    public function index()
    {
        return VDataTable::make()->slot('123456', 'top');
    }

}
