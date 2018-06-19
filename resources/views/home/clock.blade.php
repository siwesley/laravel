@extends('layouts.home')

@section('content')
    <!-- content srart -->
    <div class="am-g am-g-fixed blog-fixed">
        <div class="am-u-md-8 am-u-sm-12">

            <article class="am-g blog-entry-article">
                <div class="am-u-sm-12 blog-entry-img"
                     style="text-align: center;font-weight: 300;">

                </div>
                <div class="am-u-sm-12 blog-entry-img" style="margin-top: 1.5rem">
                    <form class="am-form am-form-horizontal">
                        <div class="am-form-group">
                            <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">体重</label>
                            <div class="am-u-sm-10">
                                <input type="text" id="doc-ipt-3" placeholder="输个体重吧~" id="weight">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="doc-ipt-pwd-2" class="am-u-sm-2 am-form-label">早饭</label>
                            <div class="am-u-sm-10">
                                <input type="checkbox" data-am-switch name="breakfast" data-off-text="没吃"
                                       data-on-text="吃啦" data-on-color="success" data-off-color="danger"
                                       id="switch-breakfast"/>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="doc-ipt-pwd-2" class="am-u-sm-2 am-form-label">午饭</label>
                            <div class="am-u-sm-10">
                                <input type="checkbox" data-am-switch name="breakfast" data-off-text="没吃"
                                       data-on-text="吃啦" data-on-color="success" data-off-color="danger"
                                       id="switch-lunch"/>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="doc-ipt-pwd-2" class="am-u-sm-2 am-form-label">晚饭</label>
                            <div class="am-u-sm-10">
                                <input type="checkbox" data-am-switch name="breakfast" data-off-text="没吃"
                                       data-on-text="吃啦" data-on-color="success" data-off-color="danger"
                                       id="switch-dinner"/>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="doc-ipt-3" class="am-u-sm-2 am-form-label">备注</label>
                            <div class="am-u-sm-10">
                                <input type="text" id="doc-ipt-3" placeholder="也许有你想备注的事儿~" id="remarks">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-10 am-u-sm-offset-2">
                                <button type="button" class="am-btn am-btn-default submit">提交</button>
                            </div>
                        </div>
                    </form>
                </div>

            </article>

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
    <script src="{{ asset('AdminLTE/layer/mobile/layer.js') }}"></script>
    <script>
        $('.submit').click(function () {
            var weight = $('#weight').val();
            var breakfast = $('#switch-breakfast').bootstrapSwitch('state', $(this).data('switch-value'));
            var lunch = $('#switch-lunch').bootstrapSwitch('state', $(this).data('switch-value'));
            var dinner = $('#switch-dinner').bootstrapSwitch('state', $(this).data('switch-value'));
            var remarks = $('#remarks').val();

            $.ajax({
                type: 'POST',
                url: "{{ url('clock') }}",
                dataType: 'json',
                data: {'weight': weight, 'breakfast': breakfast, 'lunch': lunch, 'dinner': dinner, 'remarks': remarks},
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                success: function (data) {
                    console.log(data);
                    if (data.status == 200) {
                        layer.open({
                            content: data.msg
                            , skin: 'msg'
                            , time: 2, //2秒后自动关闭
                            end : function () {
                                window.location.reload();
                            }
                        });
                    } else {
                        layer.open({
                            content: data.msg
                            , skin: 'msg'
                            , time: 2 //2秒后自动关闭
                        });
                    }
                }
            });
        });
    </script>
@endsection