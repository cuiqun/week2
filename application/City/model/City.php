<?php

namespace app\City\model;

use think\Model;

class City extends Model
{
    //
    protected $table="city";

    public static function selData(){
        return self::where('keys',0)->select();
    }
    public static function shengs($id){
        return self::where('keys',$id)->select();
    }
}
