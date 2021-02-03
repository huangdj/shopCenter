@extends('layouts.admin.app')

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="/admin">首页</a></li>
                <li>评价列表</li>
            </ol>
        </div>

        @include('layouts.admin.shared._flash')

        <div class="page-body">
{{--            <div class="am-g">--}}
{{--                <form action="" class="am-form am-form-horizontal">--}}
{{--                    <div class="am-u-sm-12 am-u-md-3">--}}
{{--                        <div class="am-form-group">--}}
{{--                            <label for="title" class="am-u-sm-4 am-form-label">按订单号</label>--}}
{{--                            <div class="am-u-sm-8">--}}
{{--                                <input type="text" name="name" placeholder="请输入订单号" value="{{ Request::input('name') }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="am-u-sm-12 am-u-md-3">--}}
{{--                        <div class="am-form-group">--}}
{{--                            <label for="title" class="am-u-sm-4 am-form-label">会员昵称</label>--}}
{{--                            <div class="am-u-sm-8">--}}
{{--                                <input type="text" name="name" placeholder="请输入名称" value="{{ Request::input('name') }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="am-u-sm-12 am-u-md-3">--}}
{{--                        <div class="am-form-group">--}}
{{--                            <label for="category_id" class="am-u-sm-4 am-form-label">按日期</label>--}}
{{--                            <div class="am-u-sm-8">--}}
{{--                                <input type="text" id="created_at" placeholder="选择时间日期" name="created_at"--}}
{{--                                       value="{{ Request::input('created_at') }}" class="am-form-field am-input-sm"/>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="am-u-sm-12 am-u-md-3">--}}
{{--                        <div class="am-form-group search-buttons">--}}
{{--                            <button class="am-btn am-btn-primary" type="submit">查 询</button>--}}
{{--                            <button class="am-btn am-btn-default" type="button"--}}
{{--                                    onclick="location.href='/admin/appraises'">重 置--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}

            <div class="am-g am-g-collapse">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-id">ID</th>
                                <th class="table-title">订单编号</th>
                                <th class="table-title">商品编号</th>
                                <th class="table-type">评论会员</th>
                                <th class="table-type">评论内容</th>
                                <th class="table-type">评论图片</th>
                                <th class="table-type">是否显示</th>
                                <th class="table-type">评价时间</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($appraises as $appraise)
                                <tr data-id="{{ $appraise->id }}">
                                    <td>{{ $appraise->id }}</td>
                                    <td>{{ $appraise->order_id }}</td>
                                    <td>{{ $appraise->product_id }}</td>
                                    <td>{{ $appraise->customer->nickname }}</td>
                                    <td>{{ $appraise->content }}</td>
                                    <td>
                                        <img src="{{ $appraise->image }}" class="thumb">
                                    </td>
                                    <td>
                                        @if($appraise->is_show == 1)
                                            <span class="am-icon-check is_something"></span>
                                        @else
                                            <span class="am-icon-close is_something"></span>
                                        @endif
                                    </td>
                                    <td>{{ $appraise->created_at->format('Y年m月d日') }}</td>
                                    <td>
                                        <a href="{{route('admin.appraises.destroy', $appraise->id)}}" data-method="delete"
                                           data-token="{{csrf_token()}}" data-confirm="确认删除吗?">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="am-cf">
                            共 {{ $appraises->total() }} 条记录
                            <div class="am-fr">
                                {!! $appraises->appends(Request::all())->links() !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(function () {
            //是否...
            $(".is_something").click(function () {
                var _this = $(this);
                var data = {
                    id: _this.parents("tr").data('id'),
                    attr: 'is_show'
                }

                $.ajax({
                    type: "PATCH",
                    url: "{{ route('admin.appraises.is_something') }}",
                    data: data,
                    success: function () {
                        _this.toggleClass('am-icon-close am-icon-check');
                    }
                });
            });
        })
    </script>
@stop
