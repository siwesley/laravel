<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>陆宝 - 一个程序员的独白</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="{{ asset('Home/i/doge.png') }}">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="{{ asset('Home/i/doge.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="apple-touch-icon-precomposed" href="{{ asset('Home/i/doge.png') }}">
    <meta name="msapplication-TileImage" content="{{ asset('Home/i/doge.png') }}">
    <meta name="msapplication-TileColor" content="#0e90d2">
    <link rel="stylesheet" href="{{ asset('Home/css/amazeui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Home/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('Home/css/amazeui.switch.css') }}">
    <script src="{{ asset('Home/js/jquery.min.js') }}"></script>
</head>

<body id="blog">

<header class="am-g am-g-fixed blog-fixed blog-text-center blog-header">
    <div class="am-u-sm-8 am-u-sm-centered">
        <img width="200" src="{{ asset('Home/i/doge.png') }}" alt="陆宝 Logo"/>
        <h2 class="am-hide-sm-only">陆宝宝宝宝宝宝宝</h2>
    </div>
</header>
<hr>
<!-- nav start -->
<nav class="am-g am-g-fixed blog-fixed blog-nav">
    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only blog-button"
            data-am-collapse="{target: '#blog-collapse'}"><span class="am-sr-only">导航切换</span> <span
                class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="blog-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav">
            <li><a href="{{ url('/') }}">首页</a></li>
            <li><a href="{{ url('clock') }}">打卡</a></li>
        </ul>
        <form class="am-topbar-form am-topbar-right am-form-inline" role="search">
            <div class="am-form-group">
                <input type="text" class="am-form-field am-input-sm" placeholder="搜索">
            </div>
        </form>
    </div>
</nav>
<hr>
<!-- nav end -->

@yield('content')


<footer class="blog-footer">
    <div class="blog-text-center">© 2017 zhangxiaoyao.cn 版权所有 ICP证：晋ICP备17006387号</div>
    <div class="blog-text-center">联系邮箱：lnsyao@vip.qq.com</div>
</footer>

<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="{{ asset('Home/js/amazeui.ie8polyfill.min.js') }}"></script>
<![endif]-->
<script src="{{ asset('Home/js/amazeui.min.js') }}"></script>
<script src="{{ asset('Home/js/amazeui.switch.min.js') }}"></script>
<script>
    $(document).ready(function () {
        var path_array = window.location.pathname.split('/');
        var scheme_less_url = window.location.href;
        if(path_array[1] == ''){
            scheme_less_url = scheme_less_url.substring(0,scheme_less_url.length-1);
        }
        $('ul.am-topbar-nav>li').find('a[href="' + scheme_less_url + '"]').closest('li').addClass('am-active');  //链接高亮
    });
</script>
</body>
</html>