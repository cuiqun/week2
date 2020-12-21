<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\thinkphp\public/../application/rbac\view\login\login.html";i:1603985656;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>
<lable>用户名：</lable>
<input type="text" id="uname">
<span id="p1"></span><br>
<label>密码：</label>
<input type="password" id="upwd">
<span id="p2"></span><br>
<button type="button" id="sub">登录</button>
</body>
</html>
<script>
    $(document).ready(function(){
        $("#sub").click(function(){
            var uname = $('#uname').val();
            var upwd = $('#upwd').val();
            $.ajax({
                type: "POST",
                url: "http://www.tpshop.com/rbac/login/login",
                data: {
                    uname:uname,
                    upwd:upwd
                },
                success: function(msg){
                    if (msg.code==1){
                        $('#p1').html("用户名错误");
                    }
                    if (msg.code==2){
                        $('#p2').html("密码错误");
                    }
                    if (msg.code==0){
                        window.location.href="show";
                    }
                }
            });
        });
    });
</script>