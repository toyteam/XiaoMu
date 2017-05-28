@extends('commen.user')

@section('css')
<link href="{{asset('')}}fileinput/css/fileinput.css" rel="stylesheet">
<style>
    .tab-div{
        min-height:400px;
    }
</style>
<style>

.kv-avatar .file-input {
    display: table-cell;
    max-width: 220px;
}
.file-input .file-default-preview{
    width: 160px;
}
</style>
@stop

@section('col')
            <div class="col-md-12">
                <div class="mb-block">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="tabcordion">
                                <ul class="nav nav-tabs">
                                    @if(session()->get('user_id', 0) == $user_info->id)
                                    <li class="active"><a data-target="#profile" href="#">个人信息</a></li>
                                    <li><a data-target="#article" href="#">文章</a></li>
                                    @else
                                    <li class="active"><a data-target="#article" href="#">文章</a></li>
                                    @endif
                                    <li><a data-target="#user_follow" href="#">他关注的人</a></li>
                                    <li><a data-target="#follow_user" href="#">关注他的人</a></li>
                                    <li><a data-target="#message" href="#">留言</a></li>
                                    <span class="pull-right"><a class="btn btn-primary" href="{{url('blog/manage/write')}}">文章管理</a></span>
                                </ul>

                                <div class="tab-content">
                                @if(session()->get('user_id', 0) == $user_info->id)
                                    <div id="profile" class="active in tab-div" style="">
                                        <ul class="list-group">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <li class=""> 
                                                <form class="form-horizontal form-label-left">
                                                    <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">用户头像<br>/ 打赏二维码</label>
                                                        <div class="col-md-3 col-sm-3 col-xs-12" style="width: 200px;">
                                                            <input id="avatar" name="avatar" type="file" class="file-loading">
                                                        </div>
                                                        <div class="col-md-3 col-sm-3 col-xs-12" style="width: 200px;">
                                                            <input id="alipay" name="alipay" type="file" class="file-loading">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">用户名</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input class="form-control col-md-7 col-xs-12" type="text" name="user_name" value="{{$user_info->user_name}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">密码</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input class="form-control col-md-7 col-xs-12" type="password" name="user_password" value="******">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">邮箱</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input class="form-control col-md-7 col-xs-12" type="email" name="user_email" value="{{$user_info->user_email}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">手机</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input class="form-control col-md-7 col-xs-12" type="text" name="user_phone" value="{{$user_info->user_phone}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">QQ</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input class="form-control col-md-7 col-xs-12" type="text" name="user_qq" value="{{$user_info->user_qq}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                                        <div class="col-md-2 col-sm-3 col-xs-12">
                                                            <button class="form-control btn btn-primary" type="submit">保存</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                                    <div id="article" class="@if(session()->get('user_id', 0) != $user_info->id) active in @endif tab-div">
                                        <ul class="list-group">
                                            @if(isset($blogs) && count($blogs) > 0)
                                                @foreach($blogs as $blog)
                                                <li class="list-item">
                                                    <div class="article-title">
                                                        <a href="{{url('blog')}}?id={{$blog->id}}">{{$blog->blog_title}}</a>
                                                    </div>
                                                    <div class="article-brief">
                                                        {!!$blog->blog_summary!!}
                                                    </div>
                                                </li>
                                                @endforeach
                                            @else
                                            <li class="list-item">
                                                <center>博主尚未发布任何文章</center>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>

                                    <div id="user_follow" class=" tab-div">
                                        <ul class="list-group">
                                            @if(isset($user_follow) && count($user_follow) > 0)
                                            @foreach($user_follow as $user)
                                            <li class="list-item"> 
                                                <div class="user">
                                                    <img src="{{$user->user_image_path}}" class="img-circle">&nbsp;
                                                    <span class="after-img-info">
                                                        <div class="user-name-sm"><a href="{{url('user')}}?id={{$user->id}}">{{$user->user_name}}</a></div>
                                                        <div class="user-bio-sm">{{$user->user_desc}}</div>
                                                    </span>
                                                </div>
                                            </li>
                                            @endforeach
                                            @else
                                            <li class="list-item">
                                                <center>博主尚未关注任何人</center>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>

                                    <div id="follow_user" class=" tab-div">
                                        <ul class="list-group">
                                            @if(isset($follow_user) && count($follow_user) > 0)
                                            @foreach($follow_user as $user)
                                            <li class="list-item"> 
                                                <div class="user">
                                                    <img src="{{$user->user_image_path}}" class="img-circle">&nbsp;
                                                    <span class="after-img-info">
                                                        <div class="user-name-sm"><a href="{{url('user')}}?id={{$user->id}}">{{$user->user_name}}</a></div>
                                                        <div class="user-bio-sm">{{$user->user_desc}}</div>
                                                    </span>
                                                </div>
                                            </li>
                                            @endforeach
                                            @else
                                            <li class="list-item">
                                                <center>尚未有任何人关注博主</center>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>

                                    <div id="message" class=" tab-div" style="">
                                        <ul class="list-group">
                                            @if(isset($messages) && count($messages) > 0)
                                            @foreach($messages as $message)
                                            <li class="list-item"> 
                                                <div class="user">
                                                    <img src="{{$user->user_image_path}}" class="img-circle">&nbsp;
                                                    <span class="after-img-info">
                                                        <div class="user-name-sm"><a href="{{url('user')}}?id={{$user->id}}">{{$user->user_name}}</a></div>
                                                        <div class="user-bio-sm">{{$user->user_desc}}</div>
                                                    </span>
                                                </div>
                                                <div>{{$message->message_content}}</div>
                                            </li>
                                            @endforeach
                                            @else
                                            <li class="list-item">
                                                <center>尚未有任何人给博主留言</center>
                                            </li>
                                            @endif
                                            <br>
                                            <div class="row">
                                                <form action="{{url('message')}}" method="post">
                                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                    <textarea class="form-control" rows="5" placeholder="此处输入留言"></textarea>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;">
                                                    <input type="hidden" name="id" value="{{$user_info->id}}">
                                                    <button class="btn btn-success">提交</button>
                                                </div>
                                                </form>
                                            </div>
                                        </ul>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
@stop

@section('js')

<script src="{{asset('')}}tabcordion/tabcordion.js"></script>
<script src="{{asset('')}}fileinput/js/fileinput.js"></script>
<script>
    $('.tabcordion').tabcordion();
</script>
<script>
$("#avatar").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    showRemove: false,
    showUpload: false,
    showBrowse: false,
    browseOnZoneClick: true,
    defaultPreviewContent: '<img src="{{$user_info->user_image_path}}" alt="用户头像" style="width:160px; height:160px;">',
    allowedFileExtensions: ["jpg", "png", "gif"]
}).on("filebatchselected", function(event, files) {
            $(this).fileinput("upload");
        }).on("fileuploaded", function(event, data) {
          if(data.response)
          {
            location.reload(true);
          }
        });
$("#alipay").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    showRemove: false,
    showUpload: false,
    showBrowse: false,
    browseOnZoneClick: true,
    defaultPreviewContent: '<img src="{{$user_info->user_alipay_picture_path}}" alt="用户头像" style="width:160px; height:160px;">',
    allowedFileExtensions: ["jpg", "png", "gif"]
}).on("filebatchselected", function(event, files) {
            $(this).fileinput("upload");
        }).on("fileuploaded", function(event, data) {
          if(data.response)
          {
            location.reload(true);
          }
        });
</script>
@stop

