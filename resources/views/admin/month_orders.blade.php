@extends('layouts.admin.app')

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="/admin">首页</a></li>
                <li>订单列表</li>
            </ol>
        </div>

        <div class="page-body">
            <div class="am-g">
                <form action="" class="am-form am-form-horizontal">
                    <div class="am-u-sm-12 am-u-md-6">
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">按状态</label>
                            <div class="am-u-sm-9">
                                <select data-am-selected="{btnSize: 'sm', maxHeight: 360}"
                                        name="status">
                                    <option value="-1">订单状态</option>
                                    @foreach ($order_status as $key=>$value)
                                        <option value="{{ $key }}"
                                                @if($key == Request::input('status')) selected @endif>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="am-u-sm-12 am-u-md-6">
                        <div class="am-form-group search-buttons">
                            <button class="am-btn am-btn-primary" type="submit">查 询</button>
                            <button class="am-btn am-btn-default" type="button"
                                    onclick="location.href='/admin/month_orders'">重 置
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
                                <th class="table-id">ID</th>
                                <th class="table-title">订单号</th>
                                <th class="table-title">所属会员</th>
                                <th class="table-type">订单状态</th>
                                <th class="table-type">总金额</th>
                                <th class="table-type">下单时间</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->out_trade_no }}</td>
                                    <td>{{ $order->customer->nickname }}</td>
                                    <td>
                                        @if($order->status == 1)
                                            <span class="am-badge am-badge-danger">待付款</span>
                                        @elseif($order->status == 2)
                                            <span class="am-badge am-badge-warning">待发货</span>
                                        @elseif($order->status == 3)
                                            <span class="am-badge am-badge-secondary">配货中</span>
                                        @elseif($order->status == 4)
                                            <span class="am-badge am-badge-success">待收货</span>
                                        @elseif($order->status == 5)
                                            <span class="am-badge am-badge">交易成功</span>
                                        @else($order->status == 6)
                                            <span class="am-badge am-badge-primary">已评价</span>
                                        @endif
                                    </td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->created_at->format('Y年m月d日 H:i') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="am-cf">
                            共 {{ $orders->total() }} 条记录
                            <div class="am-fr">
                                {!! $orders->appends(Request::all())->links() !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
