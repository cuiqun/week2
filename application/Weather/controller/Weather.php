<?php

namespace app\Weather\controller;

use think\Controller;
use think\Request;

class Weather extends Controller
{
    //请求第三方接口查询天气预报
    public function weather($city){
        //设定请求的接口地址
        $url="http://apis.juhe.cn/simpleWeather/query";
        //设定请求的传递参数
        $param=[
            'city'=>$city,
            'key'=>'7808686de93c14aae043ee1b8eb9916c'
        ];
        //发送请求
        $res=curl_request($url,true,$param);
        //返回的是一个JSON格式的字符串，转换为数组使用
        $data=json_decode($res,true);
        //请求成功
        if($data['error_code']==0){
            return $res;
        }else{
            return json(['code'=>500,'msg'=>'服务器繁忙,请稍后再试','data'=>$city]);
        }
    }

    //三级联动查询省份
//    public function index(){
//        return json(db("city")->where("keys",0)->select());
//    }
}
