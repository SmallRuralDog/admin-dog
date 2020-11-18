<?php

namespace SmallRuralDog\AdminDog\Components\VForm;

use SmallRuralDog\AdminDog\Components\BaseComponent;

class VForm extends BaseComponent
{

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
