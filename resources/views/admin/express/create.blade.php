@extends('layouts.admin.app')

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="/admin/express">首页</a></li>
                <li>添加物流</li>
            </ol>
        </div>

        <div class="page-body">

            @include('layouts.admin.shared._flash')

            <form class="am-form am-form-horizontal" action="{{ route('admin.express.store') }}" method="post">
                @csrf
                <div class="am-tabs am-margin">
                    <div class="am-form-group">
                        <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">物流名称</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <input type="text" name="name" placeholder="输入物流名称">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">物流公司代码</label>

                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <input type="text" name="code">
                        </div>
                        <div class="am-hide-sm-only am-u-md-4"><a href="http://www.kuaidi100.com/download/api_kuaidi100_com(20140729).doc">查看代码</a></div>
                    </div>

                    <div class="am-form-group">
                        <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">网址</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <input type="text" name="url" placeholder="输入网址">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">运费</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <input type="text" name="shipping_money" placeholder="输入运费">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">满额包邮</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <input type="text" name="shipping_free" placeholder="输入满额包邮">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label class="am-u-sm-12 am-u-md-3 am-form-label">是否可用</label>

                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <label class="am-radio-inline">
                                <input type="radio" value="1" name="is_enable"> 是
                            </label>
                            <label class="am-radio-inline">
                                <input type="radio" value="0" name="is_enable" checked> 否
                            </label>
                        </div>
                    </div>
                </div>

                <div class="am-form-group">
                    <div class="am-u-sm-12 am-u-md-9 am-u-md-offset-3">
                        <button type="button" onclick="location.href='/admin/express'" class="am-btn am-btn-default am-btn-sm am-radius">返 回</button>
                        <button type="submit" class="am-btn am-btn-primary am-btn-sm am-radius">保 存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
