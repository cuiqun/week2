<?php

namespace app\Weather\model;

use think\Model;

class Weather extends Model
{
    protected $table="city";
    //
    public static function selData(){
        return self::paginate(10);
    }
}
