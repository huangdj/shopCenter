@extends('layouts.admin.app')

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="#">首页</a></li>
                <li class="am-active">Dashboard</li>
            </ol>

            <h1>{{ getTime() }}，{{ucfirst(Auth::user()->name)}}，祝你开心每一天！</h1>
        </div>

        <div class="page-body">
            <ul class="am-avg-sm-1 am-avg-md-4 am-margin am-padding am-text-center admin-content-list ">
                <li>
                    <a href="{{ route('admin.today_orders') }}" class="am-text-success"><span
                            class="am-icon-btn am-icon-file-text"></span><br/>今日订单<br/>{{ $today_orders }}</a>
                </li>
                <li>
                    <a href="{{ route('admin.month_orders') }}" class="am-text-warning"><span
                            class="am-icon-btn am-icon-briefcase"></span><br/>本月订单<br/>{{ $month_orders }}</a>
                </li>
                <li>
                    <a href="{{ route('admin.year_orders') }}" class="am-text-danger"><span
                            class="am-icon-btn am-icon-recycle"></span><br/>全部订单<br/>{{ $year_orders }}</a>
                </li>
                <li>
                    <a href="{{ route('admin.customers.index') }}" class="am-text-secondary"><span
                            class="am-icon-btn am-icon-user-md"></span><br/>在线用户<br/>{{ $customer_count }}</a>
                </li>
            </ul>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <table class="am-table am-table-bd am-table-striped admin-content-table">
                        <thead>
                        <tr>
                            <th style="text-align: center">今日待付款订单金额</th>
                            <th style="text-align: center">今日已成交订单金额</th>
                            <th style="text-align: center">成交笔数</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="text-align: center">
                            <td><span class="am-badge am-badge-warning">{{ $today_daifu_amount }}元</span></td>
                            <td><span class="am-badge am-badge-success">{{ $today_chengjiao_amount }}元</span></td>
                            <td><span class="am-badge am-badge-primary">{{ $today_chengjiao_count }}</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="am-u-sm-12">
                    <table class="am-table am-table-bd am-table-striped admin-content-table">
                        <thead>
                        <tr>
                            <th style="text-align: center">本月待付款订单金额</th>
                            <th style="text-align: center">本月已成交订单金额</th>
                            <th style="text-align: center">成交笔数</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="text-align: center">
                            <td><span class="am-badge am-badge-warning">{{ $month_daifu_amount }}元</span></td>
                            <td><span class="am-badge am-badge-success">{{ $month_chengjiao_amount }}元</span></td>
                            <td><span class="am-badge am-badge-primary">{{ $month_chengjiao_count }}</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="am-u-sm-12">
                    <table class="am-table am-table-bd am-table-striped admin-content-table">
                        <thead>
                        <tr>
                            <th style="text-align: center">全部待付款订单金额</th>
                            <th style="text-align: center">全部已成交订单金额</th>
                            <th style="text-align: center">成交笔数</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="text-align: center">
                            <td><span class="am-badge am-badge-warning">{{ $year_daifu_amount }}元</span></td>
                            <td><span class="am-badge am-badge-success">{{ $year_chengjiao_amount }}元</span></td>
                            <td><span class="am-badge am-badge-primary">{{ $year_chengjiao_count }}</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
