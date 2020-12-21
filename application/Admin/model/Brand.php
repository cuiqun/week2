<?php

namespace app\Admin\model;

use think\Model;
//use traits\model\SoftDelete;

class Brand extends Model
{
    //
//    use SoftDelete;
//    protected $deleteTime = 'delete_time';
    protected $table="tpshop_brand";
    protected $resultSetType="collection";

    static public function seleData(){
        return self::select();
    }
    public function addData($data){
        $this->data($data);
        return $this->allowField(['brand_name','brand_desc','brand_site'])->save();
    }
    //查询商品的详情信息
//    public static function getGoods($id){
//        return self::find($id);
//    }
    //修改商品的信息
//    public function upData($data){
//        return  $this->allowField(true)->save($data,['brand_id'=>$data['id']]);
//    }
    //删除商品信息
    public static function deleteData($id){
        return self::destroy($id);
    }
}
