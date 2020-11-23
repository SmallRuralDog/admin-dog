<?php


namespace SmallRuralDog\AdminDog\Traits\Component;


trait VModel
{

    /**
     * 设置组件 v-model
     * @param string $vModel
     * @return $this
     */
    public function vModel(string $vModel)
    {
        $this->vModel = $vModel;
        return $this;
    }

}
