@extends('layouts.admin.app')

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="/admin">首页</a></li>
                <li>设置列表</li>
            </ol>
        </div>

        @include('layouts.admin.shared._flash')

        <div class="am-g">
            <form class="am-form am-form-horizontal" action="{{route('admin.config.setting_update')}}" method="post">
                @csrf
                @method('PUT')
                <div class="am-tabs am-margin">
                    <div class="am-form-group">
                        <label for="name" class="am-u-sm-12 am-u-md-3 am-form-label">设置下单金额</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <input type="text" name="money" placeholder="请输入最低下单金额" value="{{ $config->money }}">
                        </div>
                    </div>
                </div>

                <div class="am-tabs am-margin">
                    <div class="am-form-group">
                        <label for="name" class="am-u-sm-12 am-u-md-3 am-form-label">领券说明</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <textarea name="receive" cols="5">{{ $config->receive }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="am-form-group">
                    <div class="am-u-sm-12 am-u-md-9 am-u-md-offset-3">
                        <button type="button" onclick="location.href='/admin/setting'"
                                class="am-btn am-btn-default am-btn-sm am-radius">返 回
                        </button>
                        <button type="submit" class="am-btn am-btn-primary am-btn-sm am-radius">保 存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
