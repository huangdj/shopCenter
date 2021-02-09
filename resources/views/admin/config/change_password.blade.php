@extends('layouts.admin.app')

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="/admin">首页</a></li>
                <li>修改密码</li>
            </ol>
        </div>

        @include('layouts.admin.shared._flash')

        <div class="am-g">
            <form class="am-form am-form-horizontal" action="{{route('admin.update_password')}}" method="post">
                @csrf
                @method('PUT')
                <div class="am-tabs am-margin">
                    <div class="am-form-group">
                        <label for="name" class="am-u-sm-12 am-u-md-3 am-form-label">管理员</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <input type="text" name="name" value="{{ Auth::user()->name }}" disabled>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="name" class="am-u-sm-12 am-u-md-3 am-form-label">原始密码</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <input type="password" name="oldpassword" placeholder="请输入原始密码">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="name" class="am-u-sm-12 am-u-md-3 am-form-label">新密码</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <input type="password" name="password" placeholder="请输入新密码">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="name" class="am-u-sm-12 am-u-md-3 am-form-label">确认新密码</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <input type="password" name="newpassword" placeholder="请再次输入新密码">
                        </div>
                    </div>
                </div>

                <div class="am-form-group">
                    <div class="am-u-sm-12 am-u-md-9 am-u-md-offset-3">
                        <button type="button" onclick="location.href='/admin'"
                                class="am-btn am-btn-default am-btn-sm am-radius">返 回
                        </button>
                        <button type="submit" class="am-btn am-btn-primary am-btn-sm am-radius">保 存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
