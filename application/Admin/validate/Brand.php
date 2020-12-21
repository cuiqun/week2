<?php


namespace app\Admin\validate;


use think\Validate;

class Brand extends Validate
{
    protected $rule=[
        'brand_name'=>'require|max:30|chs',
        'brand_site'=>'gt:0',
        'brand_desc'=>'require',
        'brand_sort'=>'require|number'
    ];
    protected $message=[
        'brand_name.require'=>'品牌名称不能为空',
        'brand_name.max'=>'品牌名称长度为30个字符内',
        'brand_name.chs'=>'品牌名称必须为汉字',
        'brand_site.gt'=>'品牌网址格式错误',
        'brand_desc.require'=>'品牌描述不能为空',
        'brand_sort.require'=>'排序框不能为空',
        'brand_sort.number'=>'排序框必须是纯数字'
    ];
}