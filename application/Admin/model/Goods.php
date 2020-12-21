<?php

namespace app\Admin\model;

use think\Model;
//use引用SoftDelete
use traits\model\SoftDelete;

class Goods extends Model
{
    //软删除 需要引用的类
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $table="tpshop_goods";
    protected $resultSetType="collection";
    //查看商品信息列表
    public static function selData(){
        return self::paginate(7);
    }
    //保存商品信息
    public function addData($data){
        $this->data($data);
        return $this->allowField(['goods_name','goods_price','goods_number','goods_introduce','goods_logo'])->save();
    }
    //查询商品的详情信息
    public static function getGoods($id){
        return self::find($id);
    }
    //修改商品的信息
    public function upData($data){
      return  $this->allowField(true)->save($data,['id'=>$data['id']]);
    }
    //删除商品信息
    public static function deleteData($id){
        return self::destroy($id);
    }
}
