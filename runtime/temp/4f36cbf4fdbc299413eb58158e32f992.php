<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\thinkphp\public/../application/admin\view\login\login.html";i:1603008667;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登录</title>
    <link href="/static/css/login.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        .login-bg{
            /*background-color: silver;*/
            background: url(/static/img/login-bg-3.jpg) no-repeat center center fixed;
            background-size: 100% 100%;
        }
    </style>
    <script src='/static/js/jquery-3.1.1.min.js'></script>
</head>
  
<body class="login-bg">
    <div class="login-box">
        <header>
            <h1>TPSHOP管理员登录系统</h1>
        </header>
        <div class="login-main">
			<form action="<?php echo url('login'); ?>" class="form" method="post">
				<div class="form-item">
					<label class="login-icon">
						<i></i>
					</label>
					<input type="text" id='username' name="username" placeholder="这里输入登录名" required>
				</div>
                <div class="form-item">
                    <label class="login-icon">
                        <i></i>
                    </label>
                    <input type="password" id="password" name="password" placeholder="这里输入密码">
                </div>
                <div class="form-item verify">
                    <label class="login-icon">
                        <i></i>
                    </label>
                    <input type="text" id='verify' class="pull-left" name="code" placeholder="请输入验证码">
            <!-- 验证码-->
                    <img class="pull-right" src="<?php echo url('code'); ?>">
<!--                    <div class="pull-right"><?php echo captcha_img(); ?></div>-->
                    <div class="clear"></div>

                </div>
				<div class="form-item">
					<button type="button" class="login-btn">
						登&emsp;&emsp;录
					</button>
				</div>
			</form>
            <div class="msg"></div>
		</div>
    </div>
    <script type="text/javascript">
        $(function(){
            $('.login-btn').on('click',function(evt){
                if($('#username').val() == ''){
                    $('.msg').html('登录名不能为空');
                    return;
                }
                if($('#password').val() == ''){
                    $('.msg').html('密码不能为空');
                    return;
                }
                if($('#verify').val() == ''){
                    $('.msg').html('验证码不能为空');
                    return;
                }
                $('form').submit();

            });
            $(function () {
                $(".pull-right").click(function () {
                    $(this).attr("src","<?php echo url('code'); ?>"+"?"+Math.floor(Math.random()*10000000));
                })
            })
        });
    </script>
</body>
</html>
