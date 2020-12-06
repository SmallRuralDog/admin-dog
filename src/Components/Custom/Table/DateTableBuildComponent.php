<?php


namespace SmallRuralDog\AdminDog\Components\Custom\Table;


use SmallRuralDog\AdminDog\Components\VBtn\VBtn;

class DateTableBuildComponent
{

    public static function make()
    {
        return new DateTableBuildComponent();
    }

    public function buildCreateBtn()
    {
        return VBtn::make()->prop('color','primary')->slot('添加');
    }

}
