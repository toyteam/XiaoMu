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
        .guide{
            padding: 20px 10px;
            font-size: 16px;
            font-weight: 700px;
            color: black;
        }
        .nav li a:hover{
            color: white;
            background-color: #383838 !important;
        }
        .nav li a{
            color: black;
        }
        .container{
            margin-top: 100px;
        }
        .write{
            padding: 20px 10px;
        }
        .btn-submit{
            margin-right: 20px;
            height: 34px;
        }
        .list-item{
            border-top: solid 1px #383838;
            margin-bottom: 30px;
            padding: 10px;
        }
        .item-content{
            min-height: 40px;
        }
        .item-btn{
            margin-left: 5px;
        }
        .black{
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
                <a class="navbar-brand" href="#"><span><img height="100%" src="m.jpg"></span> 晓木Blog</a>
            </div>
            <div class="collapse navbar-collapse" id="example-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login.php">登陆</a></li>
                    <li><a href="register.php">注册</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div></div>
        <div class="col-md-3 col-sm-5 col-xs-12">
            <div class="mb-block guide">
                <div class="navbar-default sidebar">
                    <div class="sidebar-nav">
                        <ul class="nav">
                            <li><a href="blog_manage_write.php"><i class="glyphicon glyphicon-pencil"></i> 写文章</a></li>
                            <li><a href="blog_manage_garbage.php"><i class="glyphicon glyphicon-save"></i> 草稿箱</a></li>
                            <li><a href="blog_manage_reported.php"><i class="glyphicon glyphicon-open"></i> 已发布</a></li>
                            <li class="active"><a href="blog_manage_undo.php"><i class="glyphicon glyphicon-repeat"></i> 已撤回</a></li>
                            <li><a href="blog_manage_delete.php"><i class="glyphicon glyphicon-trash"></i> 已删除</a></li>
                            <li><a href="blog_manage_category.php"><i class="glyphicon glyphicon-th-list"></i> 分类管理</a></li>
                            <li><a href="blog_manage_comment.php"><i class="glyphicon glyphicon-th-list"></i> 评论管理</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-7 col-xs-12">
            <div class="mb-block write">
                <div class="mb-block-content">
                    <div class="list-blog">
                        <div class="list-item">
                            <div class="item-title">
                                <h4><input type="checkbox" name="many"> <a class="black" href="">CSDN日报20170506 ——《技术人的未来在哪里？》</a></h4>
                                <div class="item-category col-md-6 col-sm-6 col-xs-12">分类：未命名</div>
                                <div class="item-tag col-md-6 col-sm-6 col-xs-12">标签：未命名</div>
                                <div class="item-content col-md-12 col-xs-12 col-sm-12">
                                    版权声明：本文为博主原创文章，未经博主允许不得转载。
                                </div>
                                <div class="item-bottom  col-md-12 col-xs-12 col-sm-12">
                                    <a href="#">查看(20)</a>
                                    <a href="#">评论(5)</a>
                                    <a href="#" class="item-btn btn btn-xs btn-danger pull-right">删除</a>
                                    <a href="#" class="item-btn btn btn-xs btn-info pull-right">编辑</a>
                                    <a href="#" class="item-btn btn btn-xs btn-success pull-right">发表</a>
                                    <span class="pull-right">2017-12-23 10:23</span>
                                </div>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div class="list-item">
                            <div class="item-title">
                                <h4><input type="checkbox" name="many"> <a class="black" href="">CSDN日报20170506 ——《技术人的未来在哪里？》</a></h4>
                                <div class="item-category col-md-6 col-sm-6 col-xs-12">分类：未命名</div>
                                <div class="item-tag col-md-6 col-sm-6 col-xs-12">标签：未命名</div>
                                <div class="item-content col-md-12 col-xs-12 col-sm-12">
                                    版权声明：本文为博主原创文章，未经博主允许不得转载。
                                </div>
                                <div class="item-bottom  col-md-12 col-xs-12 col-sm-12">
                                    <a href="#">查看(20)</a>
                                    <a href="#">评论(5)</a>
                                    <a href="#" class="item-btn btn btn-xs btn-danger pull-right">删除</a>
                                    <a href="#" class="item-btn btn btn-xs btn-info pull-right">编辑</a>
                                    <a href="#" class="item-btn btn btn-xs btn-success pull-right">发表</a>
                                    <span class="pull-right">2017-12-23 10:23</span>
                                </div>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div class="list-item">
                            <div class="item-title">
                                <h4><input type="checkbox" name="many"> <a class="black" href="">CSDN日报20170506 ——《技术人的未来在哪里？》</a></h4>
                                <div class="item-category col-md-6 col-sm-6 col-xs-12">分类：未命名</div>
                                <div class="item-tag col-md-6 col-sm-6 col-xs-12">标签：未命名</div>
                                <div class="item-content col-md-12 col-xs-12 col-sm-12">
                                    版权声明：本文为博主原创文章，未经博主允许不得转载。
                                </div>
                                <div class="item-bottom  col-md-12 col-xs-12 col-sm-12">
                                    <a href="#">查看(20)</a>
                                    <a href="#">评论(5)</a>
                                    <a href="#" class="item-btn btn btn-xs btn-danger pull-right">删除</a>
                                    <a href="#" class="item-btn btn btn-xs btn-info pull-right">编辑</a>
                                    <a href="#" class="item-btn btn btn-xs btn-success pull-right">发表</a>
                                    <span class="pull-right">2017-12-23 10:23</span>
                                </div>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div class="list-item">
                            <div class="item-title">
                                <h4><input type="checkbox" name="many"> <a class="black" href="">CSDN日报20170506 ——《技术人的未来在哪里？》</a></h4>
                                <div class="item-category col-md-6 col-sm-6 col-xs-12">分类：未命名</div>
                                <div class="item-tag col-md-6 col-sm-6 col-xs-12">标签：未命名</div>
                                <div class="item-content col-md-12 col-xs-12 col-sm-12">
                                    版权声明：本文为博主原创文章，未经博主允许不得转载。
                                </div>
                                <div class="item-bottom  col-md-12 col-xs-12 col-sm-12">
                                    <a href="#">查看(20)</a>
                                    <a href="#">评论(5)</a>
                                    <a href="#" class="item-btn btn btn-xs btn-danger pull-right">删除</a>
                                    <a href="#" class="item-btn btn btn-xs btn-info pull-right">编辑</a>
                                    <a href="#" class="item-btn btn btn-xs btn-success pull-right">发表</a>
                                    <span class="pull-right">2017-12-23 10:23</span>
                                </div>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div class="list-item">
                            <div class="item-title">
                                <h4><input type="checkbox" name="many"> <a class="black" href="">CSDN日报20170506 ——《技术人的未来在哪里？》</a></h4>
                                <div class="item-category col-md-6 col-sm-6 col-xs-12">分类：未命名</div>
                                <div class="item-tag col-md-6 col-sm-6 col-xs-12">标签：未命名</div>
                                <div class="item-content col-md-12 col-xs-12 col-sm-12">
                                    版权声明：本文为博主原创文章，未经博主允许不得转载。
                                </div>
                                <div class="item-bottom  col-md-12 col-xs-12 col-sm-12">
                                    <a href="#">查看(20)</a>
                                    <a href="#">评论(5)</a>
                                    <a href="#" class="item-btn btn btn-xs btn-danger pull-right">删除</a>
                                    <a href="#" class="item-btn btn btn-xs btn-info pull-right">编辑</a>
                                    <a href="#" class="item-btn btn btn-xs btn-success pull-right">发表</a>
                                    <span class="pull-right">2017-12-23 10:23</span>
                                </div>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div class="list-item">
                            <div class="item-title">
                                <h4><input type="checkbox" name="many"> <a class="black" href="">CSDN日报20170506 ——《技术人的未来在哪里？》</a></h4>
                                <div class="item-category col-md-6 col-sm-6 col-xs-12">分类：未命名</div>
                                <div class="item-tag col-md-6 col-sm-6 col-xs-12">标签：未命名</div>
                                <div class="item-content col-md-12 col-xs-12 col-sm-12">
                                    版权声明：本文为博主原创文章，未经博主允许不得转载。
                                </div>
                                <div class="item-bottom  col-md-12 col-xs-12 col-sm-12">
                                    <a href="#">查看(20)</a>
                                    <a href="#">评论(5)</a>
                                    <a href="#" class="item-btn btn btn-xs btn-danger pull-right">删除</a>
                                    <a href="#" class="item-btn btn btn-xs btn-info pull-right">编辑</a>
                                    <a href="#" class="item-btn btn btn-xs btn-success pull-right">发表</a>
                                    <span class="pull-right">2017-12-23 10:23</span>
                                </div>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div class="list-item">
                            <div class="item-title">
                                <h4><input type="checkbox" name="many"> <a class="black" href="">CSDN日报20170506 ——《技术人的未来在哪里？》</a></h4>
                                <div class="item-category col-md-6 col-sm-6 col-xs-12">分类：未命名</div>
                                <div class="item-tag col-md-6 col-sm-6 col-xs-12">标签：未命名</div>
                                <div class="item-content col-md-12 col-xs-12 col-sm-12">
                                    版权声明：本文为博主原创文章，未经博主允许不得转载。
                                </div>
                                <div class="item-bottom  col-md-12 col-xs-12 col-sm-12">
                                    <a href="#">查看(20)</a>
                                    <a href="#">评论(5)</a>
                                    <a href="#" class="item-btn btn btn-xs btn-danger pull-right">删除</a>
                                    <a href="#" class="item-btn btn btn-xs btn-info pull-right">编辑</a>
                                    <a href="#" class="item-btn btn btn-xs btn-success pull-right">发表</a>
                                    <span class="pull-right">2017-12-23 10:23</span>
                                </div>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div class="list-item">
                            <div class="item-title">
                                <h4><input type="checkbox" name="many"> <a class="black" href="">CSDN日报20170506 ——《技术人的未来在哪里？》</a></h4>
                                <div class="item-category col-md-6 col-sm-6 col-xs-12">分类：未命名</div>
                                <div class="item-tag col-md-6 col-sm-6 col-xs-12">标签：未命名</div>
                                <div class="item-content col-md-12 col-xs-12 col-sm-12">
                                    版权声明：本文为博主原创文章，未经博主允许不得转载。
                                </div>
                                <div class="item-bottom  col-md-12 col-xs-12 col-sm-12">
                                    <a href="#">查看(20)</a>
                                    <a href="#">评论(5)</a>
                                    <a href="#" class="item-btn btn btn-xs btn-danger pull-right">删除</a>
                                    <a href="#" class="item-btn btn btn-xs btn-info pull-right">编辑</a>
                                    <a href="#" class="item-btn btn btn-xs btn-success pull-right">发表</a>
                                    <span class="pull-right">2017-12-23 10:23</span>
                                </div>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div class="list-item">
                            <div class="item-title">
                                <h4><input type="checkbox" name="many"> <a class="black" href="">CSDN日报20170506 ——《技术人的未来在哪里？》</a></h4>
                                <div class="item-category col-md-6 col-sm-6 col-xs-12">分类：未命名</div>
                                <div class="item-tag col-md-6 col-sm-6 col-xs-12">标签：未命名</div>
                                <div class="item-content col-md-12 col-xs-12 col-sm-12">
                                    版权声明：本文为博主原创文章，未经博主允许不得转载。
                                </div>
                                <div class="item-bottom  col-md-12 col-xs-12 col-sm-12">
                                    <a href="#">查看(20)</a>
                                    <a href="#">评论(5)</a>
                                    <a href="#" class="item-btn btn btn-xs btn-danger pull-right">删除</a>
                                    <a href="#" class="item-btn btn btn-xs btn-info pull-right">编辑</a>
                                    <a href="#" class="item-btn btn btn-xs btn-success pull-right">发表</a>
                                    <span class="pull-right">2017-12-23 10:23</span>
                                </div>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                        <div class="list-item">
                            <div class="item-title">
                                <h4><input type="checkbox" name="many"> <a class="black" href="">CSDN日报20170506 ——《技术人的未来在哪里？》</a></h4>
                                <div class="item-category col-md-6 col-sm-6 col-xs-12">分类：未命名</div>
                                <div class="item-tag col-md-6 col-sm-6 col-xs-12">标签：未命名</div>
                                <div class="item-content col-md-12 col-xs-12 col-sm-12">
                                    版权声明：本文为博主原创文章，未经博主允许不得转载。
                                </div>
                                <div class="item-bottom  col-md-12 col-xs-12 col-sm-12">
                                    <a href="#">查看(20)</a>
                                    <a href="#">评论(5)</a>
                                    <a href="#" class="item-btn btn btn-xs btn-danger pull-right">删除</a>
                                    <a href="#" class="item-btn btn btn-xs btn-info pull-right">编辑</a>
                                    <a href="#" class="item-btn btn btn-xs btn-success pull-right">发表</a>
                                    <span class="pull-right">2017-12-23 10:23</span>
                                </div>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                        
                        <div class="list-item">
                            <div class="pull-left">
                                <button class="btn btn-success btn-sm">批量发表</button>
                                <button class="btn btn-danger btn-sm">批量删除</button>
                            </div>
                            <div class="btn-group pull-right">
                                <button class="btn btn-default btn-sm">1</button>
                                <button class="btn btn-default btn-sm">2</button>
                                <button class="btn btn-default btn-sm">3</button>
                                <button class="btn btn-default btn-sm">4</button>
                                <button class="btn btn-default btn-sm">5</button>
                                <button class="btn btn-default btn-sm">6</button>
                                <button class="btn btn-default btn-sm">7</button>
                                <button class="btn btn-default btn-sm">8</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>


</body>
</html>