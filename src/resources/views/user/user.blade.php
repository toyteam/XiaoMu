@extends('commen.user')

@section('css')
<link href="{{asset('')}}fileinput/css/fileinput.css" rel="stylesheet">
<style>
    .tab-div{
        min-height:400px;
    }
</style>
<style>
.kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar .file-input {
    display: table-cell;
    max-width: 220px;
}
.kv-reqd {
    color: red;
    font-family: monospace;
    font-weight: normal;
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
                                    <li><a data-target="#chat" href="#">私信</a></li>
                                    <span class="pull-right"><a class="btn btn-primary" href="#" onclick="window.location='{{url('blog/manage/write')}}'">文章管理</a></span>
                                </ul>

                                <div class="tab-content">
                                @if(session()->get('user_id', 0) == $user_info->id)
                                    <div id="profile" class="active in tab-div" style="">
                                        <ul class="list-group">
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <li class="">
                                                <form action="{{url('user/edit')}}" class="form-horizontal form-label-left form form-vertical" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="kv-avatar center-block text-center" style="width:160px">
                                                                <input id="avatar" name="avatar" type="file" class="file-loading">
                                                                <div class="help-block"><small>选择新的头像</small></div>
                                                            </div>
                                                            <div class="kv-avatar center-block text-center" style="width:160px">
                                                                <input id="alipay" name="alipay" type="file" class="file-loading">
                                                                <div class="help-block"><small>选择新的打赏二维码</small></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-sm-5 col-md-5 col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="email">用户名<span class="kv-reqd">*</span></label>
                                                                    <input class="form-control" type="text" name="user_name" value="{{$user_info->user_name}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5 col-sm-offset-1 col-md-5 col-md-offset-1 col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="pwd">密码</label><span><a class="pull-right" href="#">修改密码</a></span>
                                                                    <input class="form-control" type="password" name="user_password" value="******" required disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-5 col-md-5 col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="fname">邮箱<span class="kv-reqd">*</span></label>
                                                                    <input class="form-control" type="email" name="user_email" value="{{$user_info->user_email}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5 col-sm-offset-1 col-md-5 col-md-offset-1 col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="lname">手机</label>
                                                                    <input class="form-control" type="text" name="user_phone" value="{{$user_info->user_phone}}" placeholder="手机可以用来找回密码哦...">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-5 col-md-5 col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="fname">QQ</label>
                                                                    <input class="form-control" type="text" name="user_qq" value="{{$user_info->user_qq}}" placeholder="我可是有QQ号的博主...">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-11 col-md-11 col-xs-11">
                                                                <div class="form-group">
                                                                    <label for="fname">自我介绍</label>
                                                                    <textarea class="form-control" name="user_desc" placeholder="介绍一下自己吧..." maxlength="30">{{$user_info->user_desc}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <hr>
                                                            <div class="col-md-offset-9 col-sm-offset-9 col-md-2" style="padding-right: 0px;">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="hidden" name="id" value="{{$user_info->id}}">
                                                                <button type="submit" class="btn btn-primary pull-right">保存</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
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
                                                    <img src="{{$message->user_image_path}}" class="img-circle">&nbsp;
                                                    <span class="after-img-info">
                                                        <div class="user-name-sm"><a href="{{url('user')}}?id={{$message->user_id}}">{{$message->user_name}}</a></div>
                                                    </span>
                                                </div>
                                                @if(session()->get('user_id', 0) == $user_info->id)
                                                <span class="pull-right"><a href="{{url('user/message/delete')}}?id={{$message->id}}">删除</a></span>
                                                @endif
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
                                                <form action="{{url('user/message')}}" method="post">
                                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                    <textarea class="form-control" rows="5" name="message" placeholder="此处输入留言"></textarea>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="id" value="{{$user_info->id}}">
                                                    <button class="btn btn-success">提交</button>
                                                </div>
                                                </form>
                                            </div>
                                        </ul>
                                    </div>

                                    <div id="chat" class=" tab-div" style="">
                                        <ul class="list-group">
                                            @if(isset($chats) && count($chats) > 0)
                                            @foreach($chats as $chat)
                                            <li class="list-item"> 
                                                <div class="user">
                                                    <img src="{{$chat->user_image_path}}" class="img-circle">&nbsp;
                                                    <span class="after-img-info">
                                                        <div class="user-name-sm"><a href="{{url('user')}}?id={{$chat->user_id}}">{{$chat->user_name}}</a></div>
                                                    </span>
                                                </div>
                                                @if(session()->get('user_id', 0) == $user_info->id)
                                                <span class="pull-right"><a href="{{url('user/chat/delete')}}?id={{$chat->id}}">删除</a></span>
                                                @endif
                                                <div>{{$chat->chat_content}}</div>
                                            </li>
                                            @endforeach
                                            @else
                                            <li class="list-item">
                                                <center>您还未给博主发过私信哦</center>
                                            </li>
                                            @endif
                                            <br>
                                            <div class="row">
                                                <form action="{{url('user/chat')}}" method="post">
                                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                    <textarea class="form-control" rows="5" name="chat" placeholder="此处输入您要说的话"></textarea>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right;">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
var btnCust = '<button type="button" class="btn btn-default" title="点我查看详情" ' + 
    'onclick="alert(\'文件大小不要超过3M\')">' +
    '<i class="glyphicon glyphicon-question-sign"></i>' +
    '</button>'; 
$("#avatar").fileinput({
    overwriteInitial: true,
    maxFileSize: 3072,
    showClose: false,
    showCaption: false,
    browseLabel: '',
    removeLabel: '',
    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
    removeTitle: '取消',
    elErrorContainer: '#kv-avatar-errors-1',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="{{$user_info->user_image_path}}" alt="用户头像" style="width:160px; height:160px;">',
    layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
    allowedFileExtensions: ["jpg", "png", "gif"]
});

var btnCust2 = '<button type="button" class="btn btn-default" title="点我查看详情" ' + 
    'onclick="alert(\'文件大小不要超过3M\')">' +
    '<i class="glyphicon glyphicon-question-sign"></i>' +
    '</button>'; 
$("#alipay").fileinput({
    overwriteInitial: true,
    maxFileSize: 3072,
    showClose: false,
    showCaption: false,
    browseLabel: '',
    removeLabel: '',
    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
    removeTitle: '取消',
    elErrorContainer: '#kv-avatar-errors-1',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="{{$user_info->user_alipay_picture_path}}" alt="打赏二维码" style="width:160px; height:160px;">',
    layoutTemplates: {main2: '{preview} ' +  btnCust2 + ' {remove} {browse}'},
    allowedFileExtensions: ["jpg", "png", "gif"]
});

</script>
@stop

