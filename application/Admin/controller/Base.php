<?php


namespace app\Admin\controller;


use think\Controller;
use think\Request;
use think\Session;

class Base extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        if (!Session::get("username")){
           return $this->error("请先登录");
        }
    }

//    public function __construct()
//    {
//        if (Session::get('username')){
//            $this->error('请登录');
//        }
//    }
}