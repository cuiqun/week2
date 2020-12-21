<?php


namespace app\Admin\validate;


use think\Validate;

class Goods extends Validate
{
    protected $rule=[
        'goods_name'=>'require',
        'goods_price'=>'require|number|gt:0',
        'goods_number'=>'require|number|gt:0',
    ];
    protected $message=[
        'goods_name.require'=>'商品名称不能为空',
        'goods_price.require'=>'商品价格不能为空',
        'goods_price.number'=>'商品价格格式错误',
        'goods_price.gt'=>'商品价格必须大于0',
        'goods_number.require'=>'商品数量不能为空',
        'goods_number.number'=>'商品数量格式错误',
        'goods_gt.require'=>'商品数量必须大于0',
    ];
}