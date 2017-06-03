<!DOCTYPE html>
<html>
<head>
    <title>MyBlog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">


    <link href="{{asset('css')}}/myblog.css" rel="stylesheet">
    <style type="text/css">
        .block{
            background-color: gray;
            margin-top: 30px;
            padding: 15px;
        }
        .user-img{
            text-align: center;
            padding: 30px;
        }
        .user-name{
            text-align: center;
            font-weight: 300;
            font-size: 16px;
            color: yellow;
            margin-bottom: 15px;
        }
        .user-desc{
            text-align: center;
            color: white;
        }
        .block .user-name a{
            color: yellow;
        }
        .block .user-name a:hover{
            color: red;
            text-decoration-line: none;
        }
        .block-head span{
            background-color: #333333;
            padding: 5px 10px; 
            color: white;
        }
        .tabcordion a{
            color: black
        }
        .list-item{
            /*border-left: solid 1px #ddd;*/
            /*border-right: solid 1px #ddd;*/
            border-bottom: solid 1px #eee;
            padding: 10px;

        }
        .item-content{
            min-height: 40px;
        }

        #hot .user-name a{
            color: white;
        }
        .article-title a{
            color: white;
        }

    </style>


</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
                    <span class="sr-only">切换导航</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><span><img height="100%" src="{{asset('image')}}/m.jpg"></span> 晓木Blog</a>
            </div>
            <div class="collapse navbar-collapse" id="example-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php if(session()->get('user_name', null) == null): ?>
                    <li><a href="{{url('login')}}">登录</a></li>
                    <li><a href="{{url('register')}}">注册</a></li>
                    <?php else: ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php echo session()->get('user_name') ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('user')}}">个人主页</a></li>
                            <li><a href="{{url('logout')}}">登出</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form class="form" id="form" method="post" action="{{url('sql/sql2')}}">
                    <div class="form-group">
                        <label class="control-label">远程sql</label>
                        <textarea class="form-control" name="sql" id="sql" rows="7"></textarea>                        
                    </div>

                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="col-md-offset-10 col-md-2 col-sm-offset-10 col-sm-2" style="padding-right: 0">
                        <button class="btn btn-primary btn-block">提交执行</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{asset('')}}tabcordion/tabcordion.js"></script>
    <script type="text/javascript">
        $('#sub').click(function () {
            // alert(1);
            $.ajax({
                url:"{{url('sql/sql2')}}",
                type: 'get',
                data: $('#form').serialize(),
                success: function(data) {
                    if(data == 'success')
                        alert('执行成功');
                    else
                        alert('执行失败');
                },
                error: function() {
                    alert('连接失败');
                }
            });
        });
    </script>
</body>
</html>