<?php

namespace app\Admin\controller;

use think\Controller;
use think\Request;

class Brand extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $data=\app\Admin\model\Brand::seleData();
        return view("brand_list",['data'=>$data]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
        return view("brand_add");
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
        $result=$this->validate($request->param(),'Brand');
        if (!true==$result){
            $this->error($result);
        }
        $data=model('Brand')->addData($request->param());
        if ($data){
            return redirect('Brand/index');
        }else{
            echo "系统繁忙，请稍后再试";
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
//        //查询对应的商品详情
//        $data=\app\Admin\model\Brand::getGoods($id);
//        //渲染商品的详情页
//        return view("goods_detail",['data'=>$data]);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
        if (\app\Admin\model\Brand::deleteData($id)){
            $this->redirect("index");
        }else{
            $this->error("系统繁忙，请稍后再试");
        }
    }
}
