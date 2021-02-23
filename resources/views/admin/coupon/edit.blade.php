@extends('layouts.admin.app')

@section('css')
    <link rel="stylesheet" href="/vendor/daterangepicker/daterangepicker.css">
@endsection

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="/admin/coupons">首页</a></li>
                <li>修改优惠券</li>
            </ol>
        </div>

        <div class="page-body">

            @include('layouts.admin.shared._flash')

            <form class="am-form am-form-horizontal" action="{{ route('admin.coupons.update', $coupon->id) }}"
                  method="post">
                @csrf
                @method('PUT')
                <div class="am-tabs am-margin">
                    <div class="am-form-group">
                        <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">名称</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <input type="text" name="name" placeholder="输入优惠券名称" value="{{ $coupon->name }}">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">优惠券面值</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <input type="text" name="value" placeholder="输入优惠券面值" value="{{ $coupon->value }}">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">总数量</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <input type="text" name="total" placeholder="输入总数量" value="{{ $coupon->total }}">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">最低订单金额</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <input type="text" name="min_amount" placeholder="输入金额" value="{{ $coupon->min_amount }}">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">开始时间</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <input type="text" name="not_before" placeholder="输入开始时间" class="change_time"
                                   value="{{ $coupon->not_before }}">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">结束时间</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <input type="text" name="not_after" placeholder="输入结束时间" class="change_time"
                                   value="{{ $coupon->not_after }}">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">使用说明</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <textarea name="description" cols="30" rows="10"
                                      placeholder="输入使用说明">{{ $coupon->description }}</textarea>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label class="am-u-sm-12 am-u-md-3 am-form-label">是否启用</label>

                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <label class="am-radio-inline">
                                <input type="radio" value="1" name="enabled" @if($coupon->enabled) checked @endif> 是
                            </label>
                            <label class="am-radio-inline">
                                <input type="radio" value="0" name="enabled" @if($coupon->enabled == 0) checked @endif>
                                否
                            </label>
                        </div>
                    </div>
                </div>

                <div class="am-form-group">
                    <div class="am-u-sm-12 am-u-md-9 am-u-md-offset-3">
                        <button type="button" onclick="location.href='/admin/coupons'"
                                class="am-btn am-btn-default am-btn-sm am-radius">返 回
                        </button>
                        <button type="submit" class="am-btn am-btn-primary am-btn-sm am-radius">保 存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="/vendor/daterangepicker/moment.min.js"></script>
    <script src="/vendor/daterangepicker/daterangepicker.js"></script>
    <script>
        $(function () {
            $('.change_time').daterangepicker({
                "singleDatePicker": true,
                "locale": {
                    "format": "YYYY-MM-DD",
                    "daysOfWeek": ["日", "一", "二", "三", "四", "五", "六"],
                    "monthNames": ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
                },
            });
        });
    </script>
@endsection
