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

        .btn-primary {
        color: #fff !important;
        background-color: #337ab7 !important;
        border-color: #2e6da4 !important;
        }
        .btn-success {
            color: #fff !important;
            background: #5cb85c;
            border: 1px solid #5cb85c;
        }
        .btn-info {
            color: #fff;
            background-color: #31b0d5;
            border-color: #269abc;
        }
        .btn-warning {
            color: #fff;
            background-color: #d9534f;
            border-color: #d43f3a;
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
                    <li><a href="{{url('login')}}">登陆</a></li>
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
                <div class="block tabcordion">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-target="#user" href="#">用户管理</a></li>
                        <li><a data-target="#article" href="#">文章管理</a></li>
                        <li><a data-target="#shield" href="#">敏感词屏蔽</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="user" class="active in tab-div">
                            <ul class="list-group">
                                <li class="list-item">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>用户名</th>
                                            <th>注册时间</th>
                                            <th>状态</th>
                                            <th>操作</th>
                                        </tr>

                                        <tr>
                                            <td>lichaoxi</td>
                                            <td>2016-12-30 16:35:12</td>
                                            <td>
                                                <label class="label label-success">已激活</label>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-warning btn-xs">封禁</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>wangjun</td>
                                            <td>2016-12-30 16:35:12</td>
                                            <td>
                                                <label class="label label-warning">未激活</label>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-success btn-xs">激活</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>xiaomu</td>
                                            <td>2016-12-30 16:35:12</td>
                                            <td>
                                                <label class="label label-danger">已封禁</label>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-xs">解封</a>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                                @if(isset($users))
                                @foreach($users as $user)
                                <li class="list-item"> 
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-12" style="border-right: 1px solid #eee; text-align: center;">
                                            <div class="user-img">
                                                <a href="#">
                                                    <img class="img-circle" width="100%" src="http://localhost/myweb/MyBlog/XiaoMu/src/public/upload/avatar/2017-05-29/5133dd245ea94e4891c338732a63bed7.jpg">
                                                </a>
                                            </div>
                                            <div class="user-name">
                                                <a href="#" >lichaoxi</a>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-12" style="padding: 10px 20px;">
                                            <div class="article-title">
                                                <a href="#">RTMP协议</a>
                                            </div>
                                            <div class="article-content">
                                                <span>RTMP协议是Real Time Message Protocol(实时信息传输协议)的缩写，它是由Adobe公司提出的一种应用层的协议，用来解决多媒体数据传输流的多路复用（Multiplexing）...</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                        <div id="article" class="tab-div">
                            <ul class="list-group">
                                <li class="list-item"> 
                                    <div class="row">
                                        <div class="col-md-9 col-sm-9 col-xs-12" style="border-right: 1px solid #eee;">
                                            <div class="article-title">
                                                <a href="#">RTMP协议</a>
                                            </div>
                                            <div class="article-content">
                                                <span>RTMP协议是Real Time Message Protocol(实时信息传输协议)的缩写，它是由Adobe公司提出的一种应用层的协议，用来解决多媒体数据传输流的多路复用（Multiplexing）...</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12" style="padding: 10px 20px;">
                                            <a href="#" style=" color: white">删除</a>
                                            <a href="#" style=" color: white">推荐</a>
                                            <a href="#" style=" color: white">置顶</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-item"> 
                                    <div class="row">
                                        <div class="col-md-9 col-sm-9 col-xs-12" style="border-right: 1px solid #eee;">
                                            <div class="article-title">
                                                <a href="#">RTMP协议</a>
                                            </div>
                                            <div class="article-content">
                                                <span>RTMP协议是Real Time Message Protocol(实时信息传输协议)的缩写，它是由Adobe公司提出的一种应用层的协议，用来解决多媒体数据传输流的多路复用（Multiplexing）...</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12" style="padding: 10px 20px;">
                                            <a href="#" style=" color: white">删除</a>
                                            <a href="#" style=" color: white">推荐</a>
                                            <a href="#" style=" color: white">置顶</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-item"> 
                                    <div class="row">
                                        <div class="col-md-9 col-sm-9 col-xs-12" style="border-right: 1px solid #eee;">
                                            <div class="article-title">
                                                <a href="#">RTMP协议</a>
                                            </div>
                                            <div class="article-content">
                                                <span>RTMP协议是Real Time Message Protocol(实时信息传输协议)的缩写，它是由Adobe公司提出的一种应用层的协议，用来解决多媒体数据传输流的多路复用（Multiplexing）...</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12" style="padding: 10px 20px;">
                                            <a href="#" style=" color: white">删除</a>
                                            <a href="#" style=" color: white">推荐</a>
                                            <a href="#" style=" color: white">置顶</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-item"> 
                                    <div class="row">
                                        <div class="col-md-9 col-sm-9 col-xs-12" style="border-right: 1px solid #eee;">
                                            <div class="article-title">
                                                <a href="#">RTMP协议</a>
                                            </div>
                                            <div class="article-content">
                                                <span>RTMP协议是Real Time Message Protocol(实时信息传输协议)的缩写，它是由Adobe公司提出的一种应用层的协议，用来解决多媒体数据传输流的多路复用（Multiplexing）...</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12" style="padding: 10px 20px;">
                                            <a href="#" style=" color: white">删除</a>
                                            <a href="#" style=" color: white">推荐</a>
                                            <a href="#" style=" color: white">置顶</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        <div id="shield" class="tab-div">
                            <ul class="list-group">
                                <li class="list-item">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>屏蔽规则</th>
                                            <th>添加时间</th>
                                            <th>操作</th>
                                        </tr>

                                        <tr>
                                            <td>aaa</td>
                                            <td>2016-12-30 16:35:12</td>
                                            <td><a href="#">删除</a></td>
                                        </tr>
                                        <tr>
                                            <td>aaa</td>
                                            <td>2016-12-30 16:35:12</td>
                                            <td><a href="#">删除</a></td>
                                        </tr>
                                        <tr>
                                            <td>aaa</td>
                                            <td>2016-12-30 16:35:12</td>
                                            <td><a href="#">删除</a></td>
                                        </tr>
                                    </table>
                                    <div>
                                        <form method="post" class="form" action="{{url('shield')}}">
                                            <div class="form-group">
                                                <textarea class="form-control col-md-12 col-sm-12 col-xs-12" placeholder="添加规则"></textarea>
                                            </div>
                                            <br />
                                            <div class="form-group">
                                                <input type="submit" value="添加" class="btn btn-primary pull-right"/>
                                            </div>
                                            <br />
                                            <br />
                                            <br />
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>                
            </div>
        </div>
    </div>

    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{asset('')}}tabcordion/tabcordion.js"></script>
    <script>
        $('.tabcordion').tabcordion();
    </script>
</body>
</html>