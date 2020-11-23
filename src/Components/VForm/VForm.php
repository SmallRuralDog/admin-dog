<?php

namespace SmallRuralDog\AdminDog\Components\VForm;

use SmallRuralDog\AdminDog\Components\BaseComponent;
use SmallRuralDog\AdminDog\Traits\Component\OnCatch;
use SmallRuralDog\AdminDog\Traits\Component\OnFinally;
use SmallRuralDog\AdminDog\Traits\Component\OnRequesting;
use SmallRuralDog\AdminDog\Traits\Component\OnThen;

class VForm extends BaseComponent
{

    use OnCatch, OnThen, OnFinally, OnRequesting;

    protected $componentName = 'VFormPro';

    public static function make()
    {
        return new VForm();
    }

    /**
     * 设置表单字段
     * Set form fields
     * @param array $fields
     * @return $this
     */
    public function fields(array $fields)
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * 设置表单数据提交路径
     * @param $action
     * @return $this
     */
    public function action($action)
    {
        $this->action = $action;
        return $this;
    }

}
