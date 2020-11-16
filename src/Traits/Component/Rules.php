<?php


namespace SmallRuralDog\AdminDog\Traits\Component;


trait Rules
{

    /**
     * 设置验证规则
     * Set validation rules
     * @param array $rules
     * @return $this
     */
    public function rules(array $rules)
    {
        $this->rules = $rules;
        return $this;
    }

    /**
     * 设置单条验证规则
     * Set a single validation rule
     * @param string $rule
     * @return $this
     */
    public function rule(string $rule)
    {
        $this->rules[] = $rule;
        return $this;
    }
}
