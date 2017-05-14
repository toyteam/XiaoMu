@extends('commen.blogmanage')

@section('css')

<link href="http://cdn.bootcss.com/wangeditor/2.1.20/css/wangEditor.css" rel="stylesheet">

@stop

@section('container')

        <div class="col-md-9 col-sm-7 col-xs-12">
            <div class="mb-block write">
                <div class="mb-block-content">
                    <table class="table">
                        <tr>
                            <th>名称</th>
                            <th>文章数目</th>
                            <th>描述</th>
                            <th width="20%">操作</th>
                        </tr>
                        <tr>
                            <td><a class="black" href="">未命名</a></td>
                            <td>23</td>
                            <td>文章默认的分类</td>
                            <td>
                                <a href="#" class="btn btn-danger btn-xs">删除</a>
                                <a href="#" class="btn btn-info btn-xs">编辑</a>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>

@stop

@section('js')


@stop