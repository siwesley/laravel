<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>一只软萌妹</title>
    <link rel="stylesheet" href="{{ asset('layui/css/layui.css') }}">
</head>
<body>
<div id="myImg"></div>
<footer class="layui-flow-more">
    <div>网站图片均来自网络，如有侵权</div>
    <div>请联系邮箱：lnsyao@vip.qq.com</div>
    <div>© 2018 zhangxiaoyao.cn 版权所有</div>
    <div>ICP证：晋ICP备17006387号</div>
</footer>
<script src="{{ asset('layui/layui.js') }}"></script>
<script>
    layui.use('flow', function () {
        var $ = layui.jquery; //不用额外加载jQuery，flow模块本身是有依赖jQuery的，直接用即可。
        var flow = layui.flow;
        flow.load({
            elem: '#myImg' //指定列表容器
            , mb: 100 //与底部的临界距离
            , done: function (page, next) { //到达临界点（默认滚动触发），触发下一页
                var lis = [];
                //以jQuery的Ajax请求为例，请求下一页数据（注意：page是从2开始返回）
                $.get('{{ url("/list") }}?page=' + page, function (res) {
                    //假设你的列表返回在data集合中
                    layui.each(res.data.data, function (index, item) {
                        var img_list = '';
                        $.each(item.imgs, function (key, img) {
                            img_list += '<li style="width: 32%;float:left;margin:2px;height:85px;overflow: hidden;"><img lay-src="http://image.zhangxiaoyao.cn/' + img.img_url + '" alt="" style="width: 100%;"></li>';
                        });
                        lis.push('<a href="/mzitu/' + item.id +  '"><div class="layui-container" style="margin-top:20px;"><div class="layui-row"><div class="layui-col-xs3"><img lay-src="/img/1.jpg" alt="" style="width: 2.67rem;height: 2.67rem;border-radius: 50%;"></div><div class="layui-col-xs9">一只软萌妹<p style="margin-top:4px;">' + item.describe + '</p></div></div></div><div style="margin-top:20px;overflow: hidden;"><ul id="demo">' + img_list + '</ul></div></a>');
                    });
                    //执行下一页渲染，第二参数为：满足“加载更多”的条件，即后面仍有分页
                    //pages为Ajax返回的总页数，只有当前页小于总页数的情况下，才会继续出现加载更多
                    next(lis.join(''), page < res.data.last_page);
                    flow.lazyimg();
                });
            }
        });

    });
</script>
</body>
</html>