<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"D:\thinkphp\public/../application/admin\view\goods\goods_list.html";i:1603157571;s:46:"D:\thinkphp\application\Admin\view\layout.html";i:1603099034;}*/ ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>后台管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="/static/css/main.css" rel="stylesheet" type="text/css"/>
    <link href="/static/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <script src="/static/js/jquery-1.8.1.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
</head>
<body>
<!-- 上 -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <ul class="nav pull-right">
                <li id="fat-menu" class="dropdown">
                    <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                                    <!--                        显示登录者的姓名-->
                        <i class="icon-user icon-white"></i> <?php echo \think\Session::get('username'); ?>
                        <i class="icon-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="javascript:void(0);">修改密码</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="<?php echo url('login/loginOut'); ?>">安全退出</a></li>
                    </ul>
                </li>
            </ul>
            <a class="brand" href="javascript:void(0);"><span class="first">后台管理系统</span></a>
            <ul class="nav">
                <li class="active"><a href="javascript:void(0);">首页</a></li>
                <li><a href="javascript:void(0);">系统管理</a></li>
                <li><a href="javascript:void(0);">权限管理</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- 左 -->
<div class="sidebar-nav">
    <a href="#auth-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>权限管理</a>
    <ul id="auth-menu" class="nav nav-list collapse">
        <li><a href="<?php echo url('Manager/index'); ?>">管理员列表</a></li>
        <li><a href="<?php echo url('Manager/create'); ?>">管理员新增</a></li>
        <li><a href="<?php echo url('Role/index'); ?>">角色管理</a></li>
        <li><a href="<?php echo url('Auth/index'); ?>">权限管理</a></li>
    </ul>
    <a href="#goods-menu" class="nav-header" data-toggle="collapse"><i class="icon-exclamation-sign"></i>商品管理</a>
    <ul id="goods-menu" class="nav nav-list collapse in">
        <li><a href="<?php echo url('Goods/create'); ?>">商品新增</a></li>
        <li><a href="<?php echo url('Goods/index'); ?>">商品列表</a></li>
        <li><a href="<?php echo url('Goods/edit'); ?>">商品类型</a></li>
        <li><a href="<?php echo url('Goods/read'); ?>">商品分类</a></li>
    </ul>
    <a href="#order-menu" class="nav-header" data-toggle="collapse"><i class="icon-exclamation-sign"></i>订单管理</a>
    <ul id="order-menu" class="nav nav-list collapse">
        <li><a href="<?php echo url('Order/index'); ?>">订单列表</a></li>
        <li><a href="<?php echo url('Order/read'); ?>">订单新增</a></li>
    </ul>
    <a href="#manager-menu" class="nav-header" data-toggle="collapse"><i class="icon-exclamation-sign"></i>会员管理</a>
    <ul id="manager-menu" class="nav nav-list collapse">
        <li><a href="javascript:void(0);">用户列表</a></li>
        <li><a href="javascript:void(0);">用户新增</a></li>
    </ul>
    <a href="#brand-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>品牌管理</a>
    <ul id="brand-menu" class="nav nav-list collapse in">
        <li><a href="<?php echo url('Brand/index'); ?>">品牌列表</a></li>
        <li><a href="<?php echo url('Brand/create'); ?>">品牌新增</a></li>
    </ul>
    <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-exclamation-sign"></i>系统管理</a>
    <ul id="dashboard-menu" class="nav nav-list collapse">
        <li><a href="javascript:void(0);">密码修改</a></li>
    </ul>
</div>
    <!-- 右 -->
    <div class="content">
        <div class="header">
            <h1 class="page-title">商品列表</h1>
        </div>

        <div class="well">
            <!-- search button -->
            <form action="<?php echo url('Goods/index'); ?>" method="get" class="form-search">
                <div class="row-fluid" style="text-align: left;">
                    <div class="pull-left span4 unstyled">
                        <p> 商品名称：<input class="input-medium" name="" type="text"></p>
                    </div>
                </div>
                <button type="submit" class="btn">查找</button>
                <a class="btn btn-primary" href="#">新增</a>
            </form>
        </div>
        <div class="well">
            <!-- table -->
            <table class="table table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th>编号</th>
                        <th>商品名称</th>
                        <th>商品价格</th>
                        <th>商品数量</th>
                        <th>商品logo</th>
                        <th>上下架状态</th>
                        <th>添加时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr class="success">
                        <td><?php echo $vo['id']; ?></td>
                        <td><a href="<?php echo url('Goods/read'); ?>?id=<?php echo $vo['id']; ?>"><?php echo $vo['goods_name']; ?></a></td>
                        <td><?php echo $vo['goods_price']; ?></td>
                        <td><?php echo $vo['goods_number']; ?></td>
                        <td><img src="/thumb/<?php echo $vo['goods_logo']; ?>"></td>
                        <td>
                            <?php if($vo['is_show'] == '1'): ?>
                                <h3 style="color: green">√</h3>
                            <?php else: ?>
                                <h3 style="color: red;">×</h3>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $vo['create_time']; ?></td>
                        <td>
                            <a href="<?php echo url('edit'); ?>?id=<?php echo $vo['id']; ?>"> 编辑 </a>
                            <a href="<?php echo url('delete'); ?>?id=<?php echo $vo['id']; ?>"> 删除 </a>
                        </td>
                    </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <!-- pagination -->
                <?php echo $data->render(); ?>
        </div>
        
        <!-- footer -->
        <footer>
            <hr>
            <p>© 2017 <a href="javascript:void(0);" target="_blank">ADMIN</a></p>
        </footer>
    </div>

</body>
</html>