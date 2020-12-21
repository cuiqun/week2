<?php

namespace app\Admin\model;

use think\Model;

class Login extends Model
{
    //
    protected $table="tpshop_manager";
    public static function Login($username){
        return self::where("username",$username)->field("username,password")->find();
    }
}
