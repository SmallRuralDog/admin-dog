<?php


namespace SmallRuralDog\AdminDog\Controllers;


use SmallRuralDog\AdminDog\Components\VDataTable\VDataTable;

class MenuController extends AdminDogController
{

    public function index()
    {
        return VDataTable::make();
    }

}
