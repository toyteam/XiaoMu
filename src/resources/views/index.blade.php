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
            color: black;
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
            color: black;
        }
        .article-title a{
            color: black;
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
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="mb-block tabcordion">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-target="#hot" href="#">热门文章</a></li>
                        <li><a data-target="#newest" href="#">最新文章</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="hot" class="active in tab-div">
                            <ul class="list-group">
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
                            </ul>
                        </div>
                        <div id="newest" class="tab-div">
                            <ul class="list-group">
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
                            </ul>
                        </div>
                    </div>

                </div>                
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="mb-block">
                    <div class="block-head">
                        <span>热门作者</span>
                    </div>
                    <div class="user-img">
                        <a href="#">
                            <img class="img-circle" width="100%" src="http://localhost/myweb/MyBlog/XiaoMu/src/public/upload/avatar/2017-05-29/5133dd245ea94e4891c338732a63bed7.jpg">
                        </a>
                    </div>
                    <div class="user-name">
                        <a href="#">
                            <span style="border-radius: 6px; border: 2px #282828 solid; padding: 5px; ">lichaoxi</span>
                        </a>
                    </div>
                    <div class="user-desc">
                        <span>主研方向 Android 和 JavaWeb，马不停蹄，追求卓越，钻研技术，热爱科技。</span>
                    </div>                        

                </div>
                <div class="mb-block">
                    <div class="block-head">
                        <span>敬请期待</span>
                    </div>
                    <div class="user-img">
                        &nbsp;
                    </div>
                    <div class="user-name">
                        &nbsp;
                    </div>
                    <div class="user-desc">
                        &nbsp;
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