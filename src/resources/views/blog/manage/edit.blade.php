@extends('commen.blogmanage')

@section('css')

<link href="http://cdn.bootcss.com/wangeditor/2.1.20/css/wangEditor.css" rel="stylesheet">

@stop

@section('container')

        <div class="col-md-9 col-sm-7 col-xs-12">
            <div class="mb-block write">
                <div class="mb-block-content">
                        <form action="{{url('blog/edit')}}" method="post">
                            <div class="form-group">
                                <label class="control-label">标题</label>
                                <input type="text" name="title" placeholder="请输入标题..." class="form-control" autocomplete="off" required="" value="{{$blog->blog_title}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">分类</label>
                                <select class="form-control" name="category">
                                    @foreach($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">标签</label>
                                <input type="text" name="tag" placeholder="请输入标签(每个标签之间以逗号分隔)" class="form-control" autocomplete="off" value="{{$blog->blog_tags[0]}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">正文</label>
                                <textarea name="content" id="textarea1" style="height: 500px;">{{$blog->blog_content}}</textarea>
                            </div>
                            
                            <br>
                            <br>

                            <label class="control-label pull-left">高级选项</label>
                            <hr>

                            <div class="form-group">
                                <label class="control-label">访问密码</label>
                                <input type="text" name="password" placeholder="请设置访问密码" class="form-control" autocomplete="off" value="{{$blog->blog_view_password}}">
                            </div>

                            <div class="form-group">
                                <label class="control-label">文章摘要</label>
                                <textarea name="summary" rows="7" class="form-control" placeholder="如果此项为空，则默认截取文章前200个字作为摘要">{{$blog->blog_summary}}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label class="control-label"><input type="checkbox" @if($blog->blog_index_top != null) 
                                   checked="checked" @endif  name="index_top"> 首页置顶 </label>
                                    <label class="control-label"><input type="checkbox" @if($blog->blog_category_top != null) 
                                   checked="checked" @endif  name="category_top"> 分类置顶 </label>
                                    <label class="control-label"><input type="checkbox" @if($blog->blog_allow_comment != null) 
                                   checked="checked" @endif name="allow_comment" checked> 允许评论 </label>
                                    <label class="control-label"><input type="checkbox" @if($blog->blog_is_public != null) 
                                   checked="checked" @endif name="is_public"> 仅自己可见</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $blog->id }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn-submit pull-left">保存</button>
                            </div>
                            <br>
                        </form>                    
                </div>

            </div>
        </div>

@stop

@section('js')
<script src="http://cdn.bootcss.com/wangeditor/2.1.20/js/lib/jquery-1.10.2.min.js"></script>
<script src="http://cdn.bootcss.com/wangeditor/2.1.20/js/wangEditor.js"></script>
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
        editor.config.uploadImgUrl = '{{url('upload_image')}}';
        editor.config.uploadParams = {
            '_token':"{{ csrf_token() }}"
        };
        editor.config.uploadImgFileName = 'file';
        editor.config.uploadHeaders = {
            'Accept' : 'text/x-json'
        };
        editor.config.emotions = {
            'default': {
                title: '默认',
                data: 'http://www.wangeditor.com/wangEditor/test/emotions.data'
            }
        }

        editor.create();
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-submit').click(function(e) {
                var val = $(e.target).val();
                $('#type').val(val);
            });
        });
    </script>
@stop