<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>一只软萌妹</title>
    <link rel="stylesheet" href="{{ asset('layui/css/layui.css') }}">
</head>
<style>
    div img {
        width: 100%;
    }
</style>
<body>


<div class="layui-container">
    <div class="layui-row" style="margin-top: 20px;padding: 0 15px;">
        <div class="layui-col-xs3">
            <img src="/img/1.jpg" alt="" style="width: 2.67rem;height: 2.67rem;border-radius: 50%;">
        </div>
        <div class="layui-col-xs9">
            一只软萌妹
            <p style="margin-top:4px;">{{ $data->describe }}</p>
        </div>
    </div>
</div>
<div style="margin-top:20px;" id="demo">
    {{--<ul id="demo">--}}
        {{--@foreach($data->imgs as $img)--}}
            {{--<li><img src="{{ asset('img/loading.png') }}" data-src="http://image.zhangxiaoyao.cn/{{ $img->img_url }}"></li>--}}
        {{--@endforeach--}}
    {{--</ul>--}}
    {{--<div class="layui-flow-more">~我是有底线的~</div>--}}
</div>
<footer class="layui-flow-more">
    <div>网站图片均来自网络，如有侵权</div>
    <div>请联系邮箱：lnsyao@vip.qq.com</div>
    <div>© 2018 zhangxiaoyao.cn 版权所有</div>
    <div>ICP证：晋ICP备17006387号</div>
</footer>
<script src="{{ asset('layui/layui.js') }}"></script>
{{--<script src="{{ asset('js/lazy-load-img.min.js') }}"></script>--}}
<script>
    {{--var lazyLoadImg = new LazyLoadImg({--}}
        {{--el: document.querySelector('#demo'),--}}
        {{--mode: 'default', //默认模式，将显示原图，diy模式，将自定义剪切，默认剪切居中部分--}}
        {{--time: 300, // 设置一个检测时间间隔--}}
        {{--done: true, //页面内所有数据图片加载完成后，是否自己销毁程序，true默认销毁，false不销毁--}}
        {{--position: { // 只要其中一个位置符合条件，都会触发加载机制--}}
            {{--top: 0, // 元素距离顶部--}}
            {{--right: 0, // 元素距离右边--}}
            {{--bottom: 0, // 元素距离下面--}}
            {{--left: 0 // 元素距离左边--}}
        {{--},--}}
        {{--before: function () {--}}

        {{--},--}}
        {{--success: function (el) {--}}
            {{--el.classList.add('success')--}}
        {{--},--}}
        {{--error: function (el) {--}}
            {{--el.src = '{{ asset('img/error.png') }}'--}}
        {{--}--}}
    {{--});--}}

    layui.use('flow', function () {
        var $ = layui.jquery; //不用额外加载jQuery，flow模块本身是有依赖jQuery的，直接用即可。
        var flow = layui.flow;
        flow.load({
            elem: '#demo' //指定列表容器
            , mb: 300 //与底部的临界距离
            , done: function (page, next) { //到达临界点（默认滚动触发），触发下一页
                var lis = [];
                //以jQuery的Ajax请求为例，请求下一页数据（注意：page是从2开始返回）
                $.get('{{ url("/info") }}/{{ $data->id }}?page=' + page, function (res) {
                    //假设你的列表返回在data集合中
                    layui.each(res.data.data, function (index, item) {
                        var img_list = '';
                        $.each(item.imgs, function (key, img) {
                            img_list += '<li style="width: 32%;float:left;margin:2px;height:85px;overflow: hidden;"><img lay-src="http://image.zhangxiaoyao.cn/' + img.img_url + '" alt="" style="width: 100%;"></li>';
                        });
                        lis.push('<div><img lay-src="http://image.zhangxiaoyao.cn/' + item.img_url + '" alt=""></div>');
                    });
                    //执行下一页渲染，第二参数为：满足“加载更多”的条件，即后面仍有分页
                    //pages为Ajax返回的总页数，只有当前页小于总页数的情况下，才会继续出现加载更多
                    next(lis.join(''), page < res.data.last_page);
                    flow.lazyimg();
                });
            }
        });
    });
//    layui.use('flow', function(){
//        var flow = layui.flow;
//        //当你执行这样一个方法时，即对页面中的全部带有lay-src的img元素开启了懒加载（当然你也可以指定相关img）
//        flow.lazyimg();
//    });
</script>
</body>
</html>