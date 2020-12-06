<?php

namespace SmallRuralDog\AdminDog\Components\Custom\Table;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use SmallRuralDog\AdminDog\Components\BaseComponent;
use SmallRuralDog\AdminDog\Traits\Component\OnCatch;
use SmallRuralDog\AdminDog\Traits\Component\OnFinally;
use SmallRuralDog\AdminDog\Traits\Component\OnRequesting;
use SmallRuralDog\AdminDog\Traits\Component\OnThen;

class Table extends BaseComponent
{

    use DateTableAction, OnRequesting, OnThen, OnCatch, OnFinally;

    protected $componentName = 'VAdminDogTablePro';


    /**
     * @var Model|Builder
     */
    private $model;

    /**
     * Table constructor.
     */
    public function __construct()
    {

    }

    public static function make(): Table
    {
        return new static();
    }


    /**
     *
     * @param DataTableHeader $dataTableHeader
     * @return $this
     */
    public function header(DataTableHeader $dataTableHeader): Table
    {


        $this->headers[] = $dataTableHeader;

        return $this;
    }

    /**
     * The array of items to display
     * @param $items
     * @return $this
     */
    public function items($items)
    {

        $this->items = $items;
        return $this;
    }

    /**
     * @param Model|Builder $model
     * @return $this
     */
    public function model($model)
    {
        $this->model = $model;

        $this->addHideAttrs('model');

        return $this;
    }

    /**
     * 自定义获取items的地址
     * @param string $url
     * @return $this
     */
    public function itemsURL(string $url)
    {
        $this->itemsUrl = $url;
        return $this;
    }

    public function disablePagination(bool $disablePagination = true)
    {
        $this->disablePagination = $disablePagination;
        return $this;
    }

    private function getItems()
    {
        /* @var $model Builder */
        $model = $this->model;

        if ($model) {
            //处理排序
            $sortBy = request('sortBy', []);
            $sortDesc = request('sortDesc', []);
            foreach ($sortBy as $key => $value) {

                $desc = $sortDesc[$key] == 'true' ? 'desc' : 'asc';

                //普通查询排序
                if (!Str::contains($value, '.')) {
                    $model->orderBy($value, $desc);
                } else {

                    $path = Str::of($value)->explode('.');

                    $orderByColumn = $path->last();

                    $withName = $path->forget($path->count() - 1)->join('.');

                    $model->whereHas($withName, function ($query) use ($orderByColumn, $desc, $path) {
                        $query->orderBy($orderByColumn, $desc);
                    });

                }
            }

            //无分页
            if (data_get($this, 'disablePagination', 'false') == 'true' || request('itemsPerPage') == -1) {
                return $model->get();
            }
            //分页模式
            $paginate = $model->paginate(request('itemsPerPage'));
            return [
                'items' => $paginate->items(),
                'lastPage' => $paginate->lastPage(),
                'total' => $paginate->total(),
            ];


        } else {
            abort(400, 'No Model');
        }

    }


    private function setDefault()
    {
        $this->prop('server-items-length', -1);

        $this->initSlot();
    }


    public function jsonSerialize()
    {
        if (request()->header('items')) {
            return $this->getItems();
        }


        $this->setDefault();
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
