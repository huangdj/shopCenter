@extends('layouts.admin.app')

@section('css')
    <link rel="stylesheet" href="/vendor/daterangepicker/daterangepicker.css">
@endsection

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="/admin">首页</a></li>
                <li>会员列表</li>
            </ol>
        </div>

        @include('layouts.admin.shared._flash')

        <div class="page-body">
            <div class="am-g">
                <form class="am-form am-form-horizontal" method="get">
                    <div class="am-u-sm-12 am-u-md-3">
                        <div class="am-form-group">
                            <label for="title" class="am-u-sm-3 am-form-label">昵称</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="nickname" placeholder="请输入昵称" value="{{ Request::input('nickname') }}">
                            </div>
                        </div>
                    </div>

                    <div class="am-u-sm-12 am-u-md-3">
                        <div class="am-form-group">
                            <label for="title" class="am-u-sm-3 am-form-label">OPEN_ID</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="openid" placeholder="请输入OPEN_ID" value="{{ Request::input('openid') }}">
                            </div>
                        </div>
                    </div>

                    <div class="am-u-sm-12 am-u-md-3">
                        <div class="am-form-group">
                            <label for="category_id" class="am-u-sm-3 am-form-label">日期</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="created_at" placeholder="选择时间日期" name="created_at"
                                       value="{{ Request::input('created_at') }}" class="am-form-field am-input-sm"/>
                            </div>
                        </div>
                    </div>

                    <div class="am-u-sm-12 am-u-md-3">
                        <div class="am-form-group search-buttons">
                            <button class="am-btn am-btn-primary" type="submit">查 询</button>
                            <button class="am-btn am-btn-default" type="button"
                                    onclick="location.href='/admin/customers'">重 置
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="am-g am-g-collapse">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-hover table-main">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>头像</th>
                                <th>昵称</th>
                                <th>openid</th>
                                <th>性别</th>
                                <th>积分</th>
                                <th class="am-hide-sm-only">关注时间</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td><img src="{{ $customer->headimgurl }}" alt="" class="thumb"/></td>
                                    <td>{{ $customer->nickname }}</td>
                                    <td>{{ $customer->openid }}</td>

                                    <td class="am-hide-sm-only">
                                        @if($customer->sex == 1)
                                            <span class="am-icon-male"></span>
                                        @else
                                            <span class="am-icon-female"></span>
                                        @endif
                                    </td>
                                    <td>{{ $customer->points }}</td>
                                    <td>{{ $customer->created_at }}</td>
                                    <td>
                                        <a href="/admin/orders?customer_id={{ $customer->id }}">查看订单</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="am-cf">
                            共 {{ $customers->total() }} 条记录
                            <div class="am-fr">
                                {!! $customers->appends(Request::all())->links() !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="/vendor/daterangepicker/moment.min.js"></script>
    <script src="/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="/js/daterange_config.js"></script>
@stop
