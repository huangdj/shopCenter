@extends('layouts.admin.app')

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="/admin">首页</a></li>
                <li class="am-active">数据可视化</li>
            </ol>
        </div>

        <div class="page-body">
            <div class="am-g">
                <div class="am-u-sm-12">
                    <div id="sales_count" style="width: 100%;height:400px;"></div>
                </div>
            </div>

            <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <div id="sales_amount" style="width: 100%;height:400px;"></div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="/vendor/echarts/echarts.min.js"></script>
    <script src="/vendor/echarts/china.js"></script>
    <script src="/vendor/echarts/macarons.js"></script>
    <script src="/vendor/echarts/sales_count.js"></script>
    <script src="/vendor/echarts/sales_amount.js"></script>
@stop
