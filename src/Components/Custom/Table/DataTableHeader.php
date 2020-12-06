<?php


namespace SmallRuralDog\AdminDog\Components\Custom\Table;


use SmallRuralDog\AdminDog\AdminJsonBuilder;

class DataTableHeader extends AdminJsonBuilder
{

    public $text;
    public $value;

    /**
     * DataTableHeader constructor.
     * @param $text
     * @param $value
     */
    public function __construct($text, $value)
    {
        $this->text = $text;
        $this->value = $value;
        $this->sortable = false;
    }

    /**
     * @param string $text
     * @param string $value
     * @return DataTableHeader
     */
    public static function make(string $text, string $value): DataTableHeader
    {
        return new DataTableHeader($text, $value);
    }

    /**
     * 'start' | 'center' | 'end'
     * @param string $align
     * @return $this
     */
    public function align(string $align)
    {
        $this->align = $align;
        return $this;
    }

    public function alignCenter()
    {
        $this->align = 'center';
        return $this;
    }

    public function alignEnd()
    {
        $this->align = 'end';
        return $this;
    }

    /**
     * 开启字段排序
     * @param bool $sortable
     * @return $this
     */
    public function sortable(bool $sortable = true)
    {
        $this->sortable = $sortable;
        return $this;
    }

    public function filterable(bool $filterable = true)
    {
        $this->filterable = $filterable;
        return $this;
    }

    public function groupable(bool $groupable = true)
    {
        $this->groupable = $groupable;
        return $this;
    }

    public function divider(bool $divider = true)
    {
        $this->divider = $divider;
        return $this;
    }

    /**
     * string | string[]
     * @param $class
     * @return $this
     */
    public function class($class)
    {
        $this->class = $class;
        return $this;
    }

    public function width($width)
    {
        $this->width = $width;
        return $this;
    }


}
