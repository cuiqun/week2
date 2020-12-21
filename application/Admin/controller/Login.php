<?php

namespace app\Admin\controller;


use think\captcha\Captcha;
use think\Controller;
use think\Request;
use think\Session;

class Login extends Controller
{
    public function code(){
        $config =    [
            // 验证码字体大小
            'fontSize'    =>    18,
            // 验证码位数
            'length'      =>    4,
            // 关闭验证码杂点
//            'useNoise'    =>    false,
            // 关闭画混淆曲线
            'useCurve'    =>    false,
            //  开启杂点
            'useNoise'    =>    true,
            // 设置验证码字符为纯数字
            'codeSet'     =>    '0123456798'
        ];
        $captcha = new Captcha($config);
        return $captcha->entry();
    }
    //渲染登录视图
    public function index(){
        if (session("username")){
            $this->redirect("Index/index");
        }
        //特殊页面不需要使用模板布局的时候，可以临时关闭布局
        $this->view->engine->layout(false);
        return view("login");
    }
    //验证登录信息
    public function login(Request $request){
//        dump($request->param());
        $username=$request->param("username");
        $password=$request->param("password");
        $code=$request->param("code");
        if(!captcha_check($code)){
            //验证失败
            $this->error("验证码错误");
        }
        //验证登录信息
        $data=\app\Admin\model\Login::Login($username);
        if ($data){
            //比较密码
            if ($data['password']==md5(md5($password))){
                Session::set('username',$username);
                $this->redirect("Index/index");
            }else{
                $this->error("密码错误，请重新输入");
            }
        }else{
            $this->error("管理员不存在，请联系客服");
        }
    }
    //退出登录
    public function loginOut(){
        // 删除（当前作用域）
        session('username', null);
        $this->redirect("Login/index");
    }
}
