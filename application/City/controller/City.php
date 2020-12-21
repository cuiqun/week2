<?php

namespace app\City\controller;

use think\Controller;

class City extends Controller
{
    //
    public function sel(){
        $data=\app\City\model\City::selData();
        return json(['code'=>200,'msg'=>'success','data'=>$data]);
    }
    public function sheng($id){
        $data=\app\City\model\City::shengs($id);
        return json(['code'=>200,'msg'=>'success','data'=>$data]);
    }
}
