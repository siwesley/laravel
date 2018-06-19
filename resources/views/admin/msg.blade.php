@extends('layouts.base')

@section('content')
    <link rel="stylesheet"
          href="{{ asset('AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <section class="content" id="list">
        <div class="row">
            <div class="col-xs-12">
                <div class="box" v-cloak>
                    <div class="box-header">
                        <h3 class="box-title">{{ $action }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>openid</th>
                                <th>信息详情</th>
                                <th>回复消息</th>
                                <th>创建时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="item in msg">
                                <td>@{{ item.openid }}</td>
                                <td>@{{ item.content }}</td>
                                <td>@{{ item.message }}</td>
                                <td>@{{ item.created_at }}</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>openid</th>
                                <th>信息详情</th>
                                <th>回复消息</th>
                                <th>创建时间</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>


    <!-- DataTables -->
    <script src="{{ asset('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {

            $.ajax({
                url: "{{ url('wechat/getMsg') }}",
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },

                success: function (result) {
                    var item = new Vue({
                        el: '#list',
                        data: result
                    });
                    $('#table').DataTable({
                        "bSort": false, //排序功能
                        'paging': true,
                        'lengthChange': false,
                        'info': true,
                        'autoWidth': false,
                        "oLanguage": {
                            "sLengthMenu": "每页显示 _MENU_条",
                            "sZeroRecords": "没有找到符合条件的数据",
                            "sProcessing": "&lt;img src=’./loading.gif’ /&gt;",
                            "sInfo": "当前第 _START_ - _END_ 条　共计 _TOTAL_ 条",
                            "sInfoEmpty": "木有记录",
                            "sInfoFiltered": "(从 _MAX_ 条记录中过滤)",
                            "sSearch": "搜索：",
                            "oPaginate": {
                                "sFirst": "首页",
                                "sPrevious": "前一页",
                                "sNext": "后一页",
                                "sLast": "尾页"
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection