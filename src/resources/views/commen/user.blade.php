<!DOCTYPE html>
<html>
<head>
    <title>MyBlog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{asset('css')}}/myblog.css" rel="stylesheet">
    <style type="text/css">
        .user{
            height: 40px;
            width: 100%;
        }
        .user-name-lg{
            color:black;
            font-size:25px;
            margin:5px;
        }
        .user-bio-lg{
            color:black;
            margin:5px;
        }
        .user-name-sm{
            font-size:15px;
            line-height: 17px;
            color: #555;
        }
        .user-bio-sm{
            color:black;
            margin-top: 6px;
            line-height: 17px;
            overflow: hidden;
            font-size: 14px;
            white-space: nowrap;
        }
        .avatar{/*
            width:100px;
            height:100px;*/
        }
        .avatar-img{
            width:100%;
            height:100%;
        }
        .after-img-info{
            margin-left: 48px;
            top:0px;
            float: left;
        }
        .img-circle{
            width: 40px;
            height: 40px;
            float: left;
        }
        .default-font{
            font-family: Helvetica Neue,Helvetica,PingFang SC,Hiragino Sans GB,Microsoft YaHei,Noto Sans CJK SC,WenQuanYi Micro Hei,Arial,sans-serif;
            font-size: 15px;
        }
        .event-name{
            color: #8590a6;
        }
        .article-title{
            font-size: 18px;
            font-weight: 700;
            line-height: 1.6;
            color: #1e1e1e;
        }
        .article-brief{
            margin-bottom: .72em;
        }
        .marg{
            margin-top: 25px;
        }
        .panel-body{
            padding: 30px;
        }
        .thumbnail{
            margin: 0px;
        }
        .after-img{
            font-size: 10px;
        }
        .list-item{
            border-left: solid 1px #ddd;
            border-right: solid 1px #ddd;
            border-bottom: solid 1px #383838;
            padding: 10px;
        }
        .item-content{
            min-height: 40px;
        }
        .btn-circle {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }
    </style>    
    @section('css')

    @show

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
                    <li><a href="{{url('login')}}">登陆</a></li>
                    <li><a href="{{url('register')}}">注册</a></li>
                    <?php else: ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php echo session()->get('user_name') ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('user/dynamic')}}">个人主页</a></li>
                            <li><a href="{{url('logout')}}">登出</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-block marg">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <!--avatar content-->
                            <div class="col-md-2 col-sm-4 col-xs-12" style="text-align: center;">
                                <a href="#" class="thumbnail avatar">
                                    <img src="{{asset('image')}}/user1.jpg" alt="">
                                </a><br>
                                <span class="after-img">关注(200)</span> |
                                <span class="after-img">粉丝(200)</span>
                            </div>
                            <!--info content-->
                            <div class="col-md-10 col-sm-8 col-xs-12">
                                <div class="user-name-lg col-md-12 col-sm-12 col-xs-12">
                                    <span>User</span>
                                    <span class="pull-right"><button class="btn btn-success btn-sm">关注</button></span>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
                                    <span>Hello! I'm the first user, welcome to XMBlog</span>
                                </div>
                                <div>
                                    <div class="col-md-4 col-sm-6 col-xs-12"><span>文章数目：20</span></div>
                                    <div class="col-md-4 col-sm-6 col-xs-12"><span>浏览次数：20</span></div>
                                    <div class="col-md-4 col-sm-6 col-xs-12"><span>文章数目：20</span></div>
                                    <div class="col-md-4 col-sm-6 col-xs-12"><span>文章数目：20</span></div>
                                </div>
                                <div>&nbsp;</div>
                                <div>&nbsp;</div>
                                <div class="col-md-12 col-sm-12 col-xs-12" style="bottom: 0px; position: relative;">
                                    <a href="{{url('blog/manage/write')}}" class="btn btn-primary " style="bottom: 0px">博客管理</a>
                                    <button class="btn btn-info btn-circle pull-right"><span class="glyphicon glyphicon-pencil"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @section('col')
            @show
            
        </div>
    </div>

    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    @section('js')

    @show
</body>
</html>