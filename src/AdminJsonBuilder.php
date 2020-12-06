<?php


namespace SmallRuralDog\AdminDog;


class AdminJsonBuilder implements \JsonSerializable
{

    protected $hideAttrs = [];


    public function addHideAttrs($name)
    {
        $this->hideAttrs[] = $name;
    }

    public function jsonSerialize()
    {
        $data = null;
        $hide = collect($this->hideAttrs)->push("hideAttrs")->toArray();
        foreach ($this as $key => $val) {
            if (!in_array($key, $hide)) {
                $data[$key] = $val;
            }
        }
        return $data;
    }
}
