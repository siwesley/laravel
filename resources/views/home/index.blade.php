@extends('layouts.home')

@section('content')
    <!-- banner start -->
    <div class="am-g am-g-fixed blog-fixed am-u-sm-centered blog-article-margin">
        <div data-am-widget="slider" class="am-slider am-slider-b1" data-am-slider='{&quot;controlNav&quot;:false}'>
            <ul class="am-slides">
                <li>
                    <img src="{{ asset('Home/i/lunbo1.jpg') }}">
                    {{--<div class="blog-slider-desc am-slider-desc ">--}}
                        {{--<div class="blog-text-center blog-slider-con">--}}
                            {{--<span><a href="" class="blog-color">Article &nbsp;</a></span>--}}
                            {{--<h1 class="blog-h-margin"><a href="">总在思考一句积极的话</a></h1>--}}
                            {{--<p>那时候刚好下着雨，柏油路面湿冷冷的，还闪烁着青、黄、红颜色的灯火。--}}
                            {{--</p>--}}
                            {{--<span class="blog-bor">2015/10/9</span>--}}
                            {{--<br><br><br><br><br><br><br>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </li>
                <li>
                    <img src="{{ asset('Home/i/lunbo2.jpg') }}">
                    {{--<div class="am-slider-desc blog-slider-desc">--}}
                        {{--<div class="blog-text-center blog-slider-con">--}}
                            {{--<span><a href="" class="blog-color">Article &nbsp;</a></span>--}}
                            {{--<h1 class="blog-h-margin"><a href="">总在思考一句积极的话</a></h1>--}}
                            {{--<p>那时候刚好下着雨，柏油路面湿冷冷的，还闪烁着青、黄、红颜色的灯火。--}}
                            {{--</p>--}}
                            {{--<span>2015/10/9</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </li>
            </ul>
        </div>
    </div>
    <!-- banner end -->

    <!-- content srart -->
    <div class="am-g am-g-fixed blog-fixed">
        <div class="am-u-md-8 am-u-sm-12">

            {{--<article class="am-g blog-entry-article">--}}
                {{--<div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img">--}}
                    {{--<img src="{{ asset('Home/i/lunbo2.jpg') }}" alt="" class="am-u-sm-12">--}}
                {{--</div>--}}
                {{--<div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text">--}}
                    {{--<span><a href="" class="blog-color">article &nbsp;</a></span>--}}
                    {{--<span> @amazeUI &nbsp;</span>--}}
                    {{--<span>2015/10/9</span>--}}
                    {{--<h1><a href="">我本楚狂人，凤歌笑孔丘</a></h1>--}}
                    {{--<p>我们一直在坚持着，不是为了改变这个世界，而是希望不被这个世界所改变。--}}
                    {{--</p>--}}
                    {{--<p><a href="" class="blog-continue">continue reading</a></p>--}}
                {{--</div>--}}
            {{--</article>--}}



            <ul class="am-pagination">
                {{--<li class="am-pagination-prev"><a href="">&laquo; Prev</a></li>--}}
                {{--<li class="am-pagination-next"><a href="">Next &raquo;</a></li>--}}
            </ul>
        </div>

        <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
            <div class="blog-sidebar-widget blog-bor">
                <h2 class="blog-text-center blog-title"><span>关注我的微信公众号</span></h2>
                <img src="{{ asset('Home/i/qr_code.jpg') }}" alt="二维码" class="blog-entry-img">
            </div>
            <div class="blog-sidebar-widget blog-bor">
                <h2 class="blog-text-center blog-title"><span>关注我</span></h2>
                <p>
                    <a class="qq_code"><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
                    <a href="" target="_blank"><span class="am-icon-github am-icon-fw blog-icon"></span></a>
                    <a href="http://weibo.com/2559197633" target="_blank"><span
                                class="am-icon-weibo am-icon-fw blog-icon"></span></a>
                    {{--<a href="" target="_blank"><span class="am-icon-reddit am-icon-fw blog-icon"></span></a>--}}
                    <a class="wx_code"><span class="am-icon-weixin am-icon-fw blog-icon"></span></a>
                </p>
            </div>
            <div class="blog-clear-margin blog-sidebar-widget blog-bor am-g ">
                <h2 class="blog-title"><span>TAG cloud</span></h2>
                <div class="am-u-sm-12 blog-clear-padding">
                    <a href="" class="blog-tag">星际2</a>
                    <a href="" class="blog-tag">暗黑3</a>
                </div>
            </div>
            <div class="blog-sidebar-widget blog-bor">
                <h2 class="blog-title"><span>么么哒</span></h2>
                <ul class="am-list">
                    <li><a href="#">欢迎小宝宝~</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- content end -->
    <script src="{{ asset('AdminLTE/layer/layer.js') }}"></script>
    <script>
        var img = {
            "title": "二维码", //相册标题
            "id": 1, //相册id
            "start": 0, //初始显示的图片序号，默认0
            "data": [   //相册包含的图片，数组格式
                {
                    "alt": "微信二维码",
                    "pid": 2, //图片id
                    "src": "{{ asset('Home/i/qq_code.jpg') }}", //原图地址
                    "thumb": "{{ asset('Home/i/qq_code.jpg') }}" //缩略图地址
                }
            ]
        };
        var img2 = {
            "title": "二维码", //相册标题
            "id": 2, //相册id
            "start": 0, //初始显示的图片序号，默认0
            "data": [   //相册包含的图片，数组格式
                {
                    "alt": "微信二维码",
                    "pid": 2, //图片id
                    "src": "{{ asset('Home/i/wx_code.jpg') }}", //原图地址
                    "thumb": "{{ asset('Home/i/wx_code.jpg') }}" //缩略图地址
                }
            ]
        };

        $('.qq_code').on('click',function(){
            layer.photos({
                photos: img
                , anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
            });
        });
        $('.wx_code').on('click',function(){
            layer.photos({
                photos: img2
                , anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
            });
        });


    </script>
@endsection