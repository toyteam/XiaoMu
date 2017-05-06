<!DOCTYPE html>
<html>
<head>
    <title>MyBlog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="myblog.css" rel="stylesheet">

    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        .content{
            width: 100%; 
            max-width: 350px;       
            margin: 0px auto;
            position: relative;
        }
        .login-area{
            margin: auto;
            margin-top: 100px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
        }
        .login-area-title{
            margin: 30px 0px;
            text-align: center;
        }

        .captche{
            height: 34px;
            padding: 2px;
        }

        .my-checkbox{
            min-height: 20px;
            margin-bottom: 0px;
            font-weight: 400;
        }

        h3{
            font-weight: 700;
        }

        .btn-black{
            background-color: black;
            border-color: black;
            color: white;
        }

        .btn-black:hover{
            color: white;
        }
    </style>

</head>
<body>
    <div class="content">
        <div class="login-area">
            <div class="login-area-title">
                <h3>用户登陆</h3>
            </div>
            <form action="submit.php" method="post">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" id="name" placeholder="请输入用户名" autocomplete="off" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="password" placeholder="请输入密码" autocomplete="off" required="">
                </div>
                <div class=" form-group col-md-12 col-sm-12 col-xs-12" style="padding-left: 0; padding-right: 0">
                    <div class="col-md-6 col-sm-6 col-xs-6" style="margin-left: 0; padding-left: 0">
                      <input type="text" name="captcha" class="form-control" placeholder="验证码" autocomplete="off" required="">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6" style="margin-right: 0; padding-right: 0">
                      <img src="http://7vzsal.com1.z0.glb.clouddn.com/large.png" class="captche">
                    </div>
                </div>
                <div class="form-group">
                    <label class="my-checkbox">
                        <input type="checkbox" name="autologin"> 是否自动登录
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-black btn-block">登陆</button>
                </div>
                <div class="form-group">
                    <span class="pull-left"><a href="#">站店说明</a></span>
                    <span class="pull-right"><a href="register.php">注册账号</a></span>
                </div>
                <br>
            </form>
        </div>
    </div>
</body>
</html>