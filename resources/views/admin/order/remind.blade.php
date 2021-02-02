@extends('layouts.admin.app')

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="/admin">首页</a></li>
                <li class="am-active">订单提醒</li>
            </ol>
        </div>

        <div class="page-body">
            <div class="am-g">
                <div class="am-u-sm-12">
                    <table class="am-table am-table-bd am-table-striped admin-content-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>用户名</th>
                            <th>手机号</th>
                            <th>订单号</th>
                            <th>付款时间</th>
                            <th>提醒时间</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($reminds as $remind)
                            <tr>
                                <td>{{ $remind->id }}</td>
                                <td>{{ $remind->order->customer->nickname }}</td>
                                <td><a href="tel:{{ $remind->order->customer->tel }}">{{ $remind->order->customer->tel }}</a></td>
                                <td>{{ $remind->order->out_trade_no }}</td>
                                <td><span class="am-badge am-badge-success">{{ time_format("Y年m月d日 H:i", $remind->order->pay_time) }}</span></td>
                                <td><span class="am-badge am-badge-warning">{{$remind->created_at->format('Y年m月d日 H:i')}}</span></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
