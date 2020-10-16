<?php


namespace app\test\controller;
use app\model\Goods as GoodsModel;

class Goods
{
    public function index()
    {
        return json(GoodsModel::get(1));

    }

}