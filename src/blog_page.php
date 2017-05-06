<?php session_start(); ?>
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
        .after-img-info{
            margin-left: 48px;
            top:0px;
        }

.img-circle{
    width: 40px;
    height: 40px;
    float: left;
}
    </style>

</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#example-navbar-collapse">
                    <span class="sr-only">切换导航</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><span><img height="100%" src="m.jpg"></span> 晓木Blog</a>
            </div>
            <div class="collapse navbar-collapse" id="example-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php if(!isset($_SESSION['username'])): ?>
                    <li><a href="login.php">登陆</a></li>
                    <li><a href="register.php">注册</a></li>
                    <?php else: ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php echo $_SESSION['username']; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="my_page.php">个人主页</a></li>
                            <li><a href="login.php">登出</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="mb-view-title">
            <h1>晓木Blog</h1>
            <div class="desc">黄文坚，《TensorFlow实战》作者，该书获得Google TensorFlow工程研发总监Rajat Monga、360首席科学家颜水成教授、北大长江学者崔斌教授的推荐，出版后曾获京东、亚马逊、当当计算机类图书销量第一。现任职PPmoney大数据算法总监，负责集团的风控、理财、互联网证券等业务的数据挖掘工作。Google TensorFlow Contributor。本科、研究生毕业于香港科技大学，在顶级会议和期刊SIGMOBILE MobiCom、IEEE Transactions on Image Processing发表论文，并获得两项美国专利和一项中国专利。</div>
        </div>
        <div class="row">
<!--             <div class="mb-left">
                <div class="block user-info">
                    <div class="block-title">个人信息</div>
                    <div class="block-content">
                        <img class="user-img width="100%" img width="100%"-rounded" src="default.jpg" width="100%"><br><br>

                        <p class="user-name">lichaoxi</p>

                        <div class="user-btn">
                            <button class="btn btn-info btn-xs">关注</button>
                            <button class="btn btn-info btn-xs">私信</button>
                        </div><br>

                        <div class="user-page-info">
                            <p>访问：100次</p>
                            <p>关注：1013人</p>
                            <p>粉丝：10000人</p>
                            <p>博文：115篇</p>
                        </div>
                    </div>
                </div>

                <div class="block search">
                    <div class="block-title">搜索栏目</div>
                    <div class="block-content">
                        <form action="search.php" method="get">
                            <div class="form-group has-success">
                                <input type="" name="s" class="form-control" placeholder="查找博客">
                            </div>                            
                        </form>
                    </div>
                </div>

                <div class="block category">
                    <div class="block-title">博客分类</div>
                    <div class="block-content">
                        <ul>
                            <li><a href="#">Android</a> <span>(31)</span></li>
                            <li><a href="#">Flex</a> <span>(1)</span></li>
                            <li><a href="#">iPhone开发</a> <span>(400)</span></li>
                            <li><a href="#">javaEE</a> <span>(13)</span></li>
                            <li><a href="#">javascript</a> <span>(4)</span></li>
                            <li><a href="#">Oracle</a> <span>(1)</span></li>
                            <li><a href="#">一步一步学grails</a> <span>(11)</span></li>
                            <li><a href="#">系统管理</a> <span>(3)</span></li>
                            <li><a href="#">Mac OS X</a> <span>(10)</span></li>
                        </ul>
                    </div>
                </div>

            </div> -->
            <div class="mb-right">
                <div class="bolg-info block">
                    <div class="block-title">博客内容</div>
                    <div class="block-content">
                        <div class="blog blog-title">
                            <div class="blog-title-text"><h1>2016 年最受欢迎的编程语言是什么？</h1></div>
                            <div class="user">
                                <img src="default.jpg" class="img-circle">&nbsp;
                                <div class="after-img-info">
                                    <span>黄文件</span><br>
                                    <a href="#">黄文件</a>
                                </div>
                            </div>
                            <div class="pull-left">
                                <label class="label label-info">杂谈</label>
                            </div>
                            <div class="pull-right">
                                <span>2012-12-21 2:35</span>&nbsp;&nbsp;
                                <span><span class="glyphicon glyphicon-eye-open"></span> 1232</span>&nbsp;&nbsp;
                                <span class="glyphicon glyphicon-comment"></span> <a href="#">评论10</a>&nbsp;&nbsp;
                                <span class="glyphicon glyphicon-plus"></span> <a href="#">收藏</a>&nbsp;&nbsp;
                            </div>
                        </div>

                        <div class="blog blog-content">

                            <div id="article_content" class="article_content">
                                <div class="markdown_views">
                                    <p>这两天 GitHub 对其官网进行了改版，紧接着又发布了一年一度的开源报告，我们程序员比较关心之后的趋势是什么，而 GitHub 毫无疑问代表了全世界编程领域的趋势，我们不妨先来解读下这份报告，然后再解答下你们关注的标题的答案。</p>

                                    <p>事先声明，本篇文章的一些数据完全来自这份报告，地址在这里：</p>

                                    <p><a href="https://octoverse.github.com/">https://octoverse.github.com/</a></p>



                                    <h2 id="最流行的开源项目">最流行的开源项目</h2>

                                    <p>首先发布的是过去一年在 GitHub 上最流行的开源项目，见下图：</p>

                                    <p><img width="100%" src="http://stormzhang.com/image/octoverse1.png" alt="" title=""></p>

                                    <p>可以看到其中有不少是我在之前 GitHub 系列文章里介绍过的，如 awesome、free-program-books、react-native、on-my-zsh 等，不过令我没想到的是 lantern 竟然也入选了，足以说明全世界人们对自由上网的渴望，关于 lantern 是什么我不多说了，自己去了解吧。</p>



                                    <h2 id="最受欢迎的编程语言">最受欢迎的编程语言</h2>

                                    <p>这个世界有多少种编程语言你们知道么？我想没人说得清楚，GitHub 给出了答案。GitHub 上所有的开源项目包含了 316 种编程语言。不说不知道，一说吓一跳，要知道这世界上只有 226 个国家和地区，编程语言的数量超出了世界上国家的数量，有时候就在想，那么多不为人知的编程语言都是什么人在用？</p>

                                    <p>要问 2016 年最受欢迎的编程语言是什么？同样 GitHub 也给出了答案。以下是 GitHub 根据过去 12 月提交的 PR 数量来排名的，虽然不完全准确，但是 PR 起码代表了项目的热度与欢迎度，还是值得可信的：</p>

                                    <p><img width="100%" src="http://stormzhang.com/image/octoverse2.png" alt="" title=""></p>

                                    <p>可以看到排名第一的是 JavaScript 。我想有几方面的原因吧，一是本来 GitHub 上早期的一些开源项目都是 web 前端相关的，二是随着移动端各种跨平台框架的需求，js 被予以重任，如 React Native、weex 等，三是 js 领域各种框架层出不穷，如 vue.js、angular.js、react.js 等，所以 JavaScript 排名第一并不是很意外。所以有对 web 前端感兴趣的同学，js 是必备技能，想往这方面发展依然热度不减，而事实上国内需求目前对有经验的 web 前端工程师确实很缺乏，很多时候钱多活少离家近都招不到人。</p>

                                    <p>另外老牌语言 Java 依然能排名第二蛮意外的，我想这其中很大部分是因为 Android 的发展让 Java 焕发了第二春。</p>

                                    <p>紧接着是 Python、Ruby、PHP，这三种都是属于动态语言，对于我们 Android 开发所用的 Java 静态语言是不一样的，之前有人问过我想学习一门除了 Java 之外的语言，如果实在感兴趣的话我就建议学习下 Ruby 或者 Python ，能从中了解到很多 Java 层面没接触过的知识。另外都说 PHP 是世界上最好的编程语言，这排名名不副实啊！</p>

                                    <p>另外这份排名很有意思，元老级编程语言 C++、C 几乎每年都上榜，所以根本不用担心自己用的编程语言会过时，如果真那样的话 C++、C 那些程序员早都丢饭碗了。</p>

                                    <p>最后一经出来就被热捧的 Swift 排名有点对不起大家对它的期待，今年仍然比不过亲兄弟的 Objective C ，我觉得很大原因是因为亲爹 Apple 没有让开发者们强制使用 Swift，不过增长倒是很迅速，增长了 262%，相信这增长速度加上有个强大的爹，它的发展还是很期待的，只不过听说现在甚至还在改语法，所以还没有完全成熟，不要过于这么快就报太大的期待，不过如果 iOS 开发者们到现在还没有学习甚至了解就说不过去了。</p>

                                    <p>所以，2016 年最受欢迎的编程语言是 JavaScript ！</p>

                                    <p>PS：作为 Android 开发者也蛮高兴的，毕竟我们所用的编程语言 Java 是 JavaScript 他哥！</p>



                                    <h2 id="开源贡献最多的组织">开源贡献最多的组织</h2>

                                    <p>打死我都想不到 2016 年对开源贡献最多的竟然是微软，一向封闭为主的微软今年发力开源社区，竟然超越了 Google、Facebook，加上国内很大巨头也纷纷在开源社区发力，别的不说，就说 Android 界吧，今年包括腾讯、阿里等纷纷推出各自的开源项目，可能真的说明拥抱开源，才是王道吧！</p>

                                    <p><img width="100%" src="http://stormzhang.com/image/octoverse3.png" alt="" title=""></p>



                                    <h2 id="github-新增用户">GitHub 新增用户</h2>

                                    <p>GitHub 已经有超过 520 万的用户和超 30 万的组织。而今年，中国是新用户增长最多的国家，比 15 年增长快翻了一番，而这其中，身为一个 Google、GitHub 真爱粉，我觉得我也出了一把力(装逼完成，逃…)</p>

                                    <p><img width="100%" src="http://stormzhang.com/image/octoverse4.png" alt="" title=""></p>

                                    <p>当然还有很多其他有意思的数据，这里就不一一详细介绍了，感兴趣的不妨到这里去看下。</p>

                                    <p><a href="https://octoverse.github.com/">https://octoverse.github.com/</a></p>

                                    <p>最后，GitHub 的这份报告代表着过去的数据，不过对于我们对未来的技术趋势判断有一定参考意义，所有编程从业者都有必要关注下这份报告，当然文中涉及到的一些观点纯属个人，不代表官方与任何组织，欢迎交流。</p>



                                    <h4 id="推荐阅读">推荐阅读</h4>

                                    <p><a href="http://stormzhang.com/github/2016/05/25/learn-github-from-zero1/">从0开始学习 GitHub 系列之「初识 GitHub」</a></p>

                                    <p><a href="http://stormzhang.com/github/2016/05/26/learn-github-from-zero2/">从0开始学习 GitHub 系列之「加入 GitHub」</a></p>

                                    <p><a href="http://stormzhang.com/github/2016/05/30/learn-github-from-zero3/">从0开始学习 GitHub 系列之「Git 速成」</a></p>

                                    <p><a href="http://stormzhang.com/github/2016/06/04/learn-github-from-zero4/">从0开始学习 GitHub 系列之「向GitHub 提交代码」</a></p>

                                    <p><a href="http://stormzhang.com/github/2016/06/16/learn-github-from-zero5/">从0开始学习 GitHub 系列之「Git 进阶」</a></p>

                                    <p><a href="http://stormzhang.com/github/2016/07/09/learn-from-github-from-zero6/">从0开始学习 GitHub 系列之「团队合作利器 BRANCH」</a></p>

                                    <p><a href="http://stormzhang.com/github/2016/07/28/learn-github-from-zero7/">从0开始学习 GitHub 系列之「如何发现优秀的开源项目？」</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block comment">
                    <div class="block-title">查看评论</div>
                    <div class="block-content">
                        <div class="view-comment">
                            <div class="user-comment">
                                <div class="user-img"><img src="default.jpg" width="100%"></div>
                                <div class="comment-info">
                                    <span class="pull-left">lichaoxi 2012-12-21</span>
                                    <span class="pull-right">#1</span><br>
                                    <hr>
                                    <span>晓木博客第一次评论哦！晓木博客第一次评论哦！晓木博客第一次博客第一次评论哦！晓木博客第一次评论哦！晓木博客第一次评论哦！晓木博客第一次评论哦！晓木博客第一次评论哦！晓木博客第一次评论哦！晓木博客第一次评论哦！</span><br>
                                    <hr>
                                    <div class="pull-right reply"><button class="btn btn-link btn-xs btn-reply" id="reply" value="12221521">回复</button> <a href="#">举报</a></div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <form action="submit.php" method="post">
                            <textarea name="comment" id="textarea"></textarea>
                            <button class="btn-submit pull-right">提交</button>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var editor = new wangEditor('textarea');

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
            'alignleft',
            'aligncenter',
            'alignright',
            '|',
            'link',
            'unlink',
            'emotion',
            '|',
            'img',
            'insertcode',
            '|',
            'undo',
            'redo',
            'fullscreen'
        ];

        editor.config.emotions = {
            'default': {
                title: '默认',
                data: 'http://www.wangeditor.com/wangEditor/test/emotions.data'
            }
        }

        editor.create();
    </script>

    <script>
    
        $(document).ready(function(){
            $('.btn-reply').click(function(e){
                var id = $(e.target).val();
                
            });
        });
    </script>
</body>
</html>