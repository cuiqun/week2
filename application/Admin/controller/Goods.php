<?php

namespace app\Admin\controller;

use think\Controller;
use think\Image;
use think\Request;

class Goods extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $data=\app\Admin\model\Goods::selData()->toArray();
//        dump($data);
//        die();
        return view("goods_list",['data'=>$data['data']]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
//        $data=$request->param();
//        if (model('Goods')->addData($data)){
//
//        }
        return view("goods_add");
    }
    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //表单验证
        $result=$this->validate($request->param(),'Goods');
        if (true!==$result){
//            验证失败，输出错误信息
            $this->error("$result");
        }
        // 获取表单上传文件 例如上传了001.jpg
        //open 将上传图片打开
        $image = Image::open(request()->file('goods_logo'));
        //设定要保存的路径
        $rootPath=config("view_replace_str.__UPLOADS__");
//        echo $rootPath;
//        die();
        if (!file_exists('.'.$rootPath.'/'.date('Ymd'))){
            mkdir('.'.$rootPath.'/'.date('Ymd'));
        }
        $savePath=date('Ymd').'/'.rand(1,999999).time().'.'.$image->type();
        //按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
        $res=$image->thumb(150,150)->save('.'.$rootPath.'/'.$savePath);
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($res){
                    // 将上传后的返回的地址信息放入数组中，去插入数据库保存
                    $parm=$request->param();
                    $parm['goods_logo']=$savePath;
                    //插入数据
                    $data=model('Goods')->addData($parm);
    //        dump($request->param());
    //        die();
                    if ($data){
                        return redirect('Goods/index');
                    }else{
                        echo "添加失败";
                    }
                }else{
                    // 上传失败获取错误信息
                    echo $res->getError();
                }
        }
    /**
     * 显示指定的资源
     * 查询对应的数据
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id="")
    {
        //查询对应的商品详情
        $data=\app\Admin\model\Goods::getGoods($id);
        //渲染商品的详情页
        return view("goods_detail",['data'=>$data]);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id="")
    {
        //
        $data=\app\Admin\model\Goods::getGoods($id);
        return view("goods_edit",['data'=>$data]);
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
        //获取要修改的记录id
//        $id=$request->param("goods_id");
        $res=model("Goods")->upData($request->param());
        if ($res){
            $this->redirect("index");
        }else{
            $this->error("系统繁忙，请稍后再试");
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //凡是传入的参数类的不可轻信，直接带入SQL，需要做验证
        if (!preg_match("/^\d+$/",$id)){
            $this->error("参数错误");
        }
        if (\app\Admin\model\Goods::deleteData($id)){
            $this->redirect("index");
        }else{
            $this->error("系统繁忙，请稍后再试");
        }
    }
}
