@extends('commen.blogmanage')

@section('css')

<link href="http://cdn.bootcss.com/wangeditor/2.1.20/css/wangEditor.css" rel="stylesheet">

@stop

@section('container')

        <div class="col-md-9 col-sm-7 col-xs-12">
            <div class="mb-block write">
                <div class="mb-block-content">
                    <div class="list-comment">

                        <div class="list-item">
                            <div class="item-title">
                                <div class="comment-user col-md-12 col-sm-12 col-xs-12">
                                    用户：<a href="#" class="black">lichaoxi</a>
                                    <a href="#" class="black pull-right">2017-12-23</a>
                                </div>
                                <div class="item-content col-md-12 col-xs-12 col-sm-12">
                                    版权声明：本文为博主原创文章，未经博主允许不得转载。
                                </div>
                                <div class="item-bottom  col-md-12 col-xs-12 col-sm-12">
                                    所属文章：<a href="#">CSDN日报20170506 </a>
                                    <a href="#" class="item-btn btn btn-danger btn-xs pull-right">删除</a>
                                    <span class="pull-right">2017-12-23 10:23</span>

                                </div>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
             
                        <div class="list-item">
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

@stop

@section('js')


@stop