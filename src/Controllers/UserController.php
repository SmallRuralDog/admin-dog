<?php


namespace SmallRuralDog\AdminDog\Controllers;


use SmallRuralDog\AdminDog\Components\VChip\VChip;
use SmallRuralDog\AdminDog\Components\VDataTable\VDataTable;
use SmallRuralDog\AdminDog\Components\VDataTable\VEditDialog;
use SmallRuralDog\AdminDog\Components\VIcon\VIcon;
use SmallRuralDog\AdminDog\Components\VTextField\VTextField;
use SmallRuralDog\AdminDog\Models\AdminDogUser;

class UserController extends AdminDogController
{
    public function index()
    {
        return VDataTable::make()
            ->prop('headers', [
                ['text' => 'Email', 'value' => 'email'],
                ['text' => 'Name', 'value' => 'name'],
                ['text' => 'created_at', 'value' => 'created_at'],
            ])
            ->prop('items', AdminDogUser::query()->get()->toArray())
            ->slot(VEditDialog::make()->slot('{{this.$attrs.slotValue.item.name}}')->slot(VTextField::make()->vModel('item.name'),'input'),'item.name');
    }

}
