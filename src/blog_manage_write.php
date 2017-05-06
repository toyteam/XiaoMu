<!DOCTYPE html>
<html>
<head>
    <title>MyBlog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="myblog.css" rel="stylesheet">

    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="wangEditor/dist/css/wangEditor.min.css">

    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="wangEditor/dist/js/lib/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="wangEditor/dist/js/wangEditor.min.js"></script>


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
                            <li class="active"><a href="blog_manage_write.php"><i class="glyphicon glyphicon-pencil"></i> 写文章</a></li>
                            <li><a href="blog_manage_garbage.php"><i class="glyphicon glyphicon-save"></i> 草稿箱</a></li>
                            <li><a href="blog_manage_reported.php"><i class="glyphicon glyphicon-open"></i> 已发布</a></li>
                            <li><a href="blog_manage_undo.php"><i class="glyphicon glyphicon-repeat"></i> 已撤回</a></li>
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
                        <form action="submit.php" method="post">
                            <div class="form-group">
                                <label class="control-label">标题</label>
                                <input type="text" name="title" placeholder="请输入标题..." class="form-control" autocomplete="off" required="">
                            </div>
                            <div class="form-group">
                                <label class="control-label">分类</label>
                                <select class="form-control" name="category">
                                    <option value="">未命名</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">标签</label>
                                <input type="text" name="tag" placeholder="请输入标签(每个标签之间以逗号分隔)" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="control-label">正文</label>
                                <textarea name="content" id="textarea1" style="height: 500px;"></textarea>
                            </div>
                            
                            <br>
                            <br>

                            <label class="control-label pull-left">高级选项</label>
                            <hr>

                            <div class="form-group">
                                <label class="control-label">访问密码</label>
                                <input type="text" name="password" placeholder="请设置访问密码" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label class="control-label">文章摘要</label>
                                <textarea name="blog-main" rows="7" class="form-control" placeholder="如果此项为空，则默认截取文章前200个字作为摘要"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label class="control-label"><input type="checkbox" name="main_top"> 首页置顶 </label>
                                    <label class="control-label"><input type="checkbox" name="category_top"> 分类置顶 </label>
                                    <label class="control-label"><input type="checkbox" name="allow_comment" checked> 允许评论 </label>
                                    <label class="control-label"><input type="checkbox" name="self"> 仅自己可见</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn-submit pull-left">发布博客</button>
                                <button class="btn-submit pull-left">保存草稿</button>
                            </div>
                            <br>
                        </form>                    
                </div>

            </div>
        </div>

    </div>
    <script>
        var editor = new wangEditor('textarea1');
        editor.config.menuFixed = false;
        editor.config.menus = [
            'source',
            '|',
            'bold',
            'underline',
            'italic',
            'strikethrough',
            'eraser',
            'forecolor',
            'bgcolor',
            '|',
            'quote',
            'fontfamily',
            'fontsize',
            // 'head',
            // 'unorderlist',
            'orderlist',
            'alignleft',
            'aligncenter',
            'alignright',
            '|',
            'link',
            'unlink',
            'table',
            'emotion',
            '|',
            'img',
            'video',
            'location',
            'insertcode',
            '|',
            'undo',
            'redo',
            'fullscreen'
        ];
        editor.config.uploadImgUrl = '/upload';
        editor.config.uploadParams = {
            // token1: 'abcde',
            // token2: '12345'
        };
        editor.config.uploadHeaders = {
            // 'Accept' : 'text/x-json'
        }
        editor.config.emotions = {
            'default': {
                title: '默认',
                data: 'http://www.wangeditor.com/wangEditor/test/emotions.data'
            }
        }

        editor.create();
    </script>

</body>
</html>