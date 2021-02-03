@extends('layouts.admin.app')

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="/admin">首页</a></li>
                <li>主题列表</li>
            </ol>
        </div>

        @include('layouts.admin.shared._flash')

        <div class="page-body">
            <div class="am-g">
                <form action="" class="am-form am-form-horizontal">
                    <div class="am-u-sm-12 am-u-md-6">
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">按名称</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="keyword" value="{{ Request::input('keyword') }}">
                            </div>
                        </div>
                    </div>

                    <div class="am-u-sm-12 am-u-md-6">
                        <div class="am-form-group search-buttons">
                            <button class="am-btn am-btn-primary" type="submit">查 询</button>
                            <button class="am-btn am-btn-default" type="button"
                                    onclick="location.href='/admin/themes'">重 置
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <div class="am-btn-toolbar">
                        <div class="">
                            <button type="button" class="am-btn am-btn-primary"
                                    onclick="location.href='/admin/themes/create'"><span class="am-icon-plus"></span>
                                新增
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="am-g am-g-collapse">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-id">ID</th>
                                <th class="table-title">主题名称</th>
                                <th class="table-title">缩略图</th>
                                <th class="table-type">是否置左</th>
                                <th class="table-type">是否置右</th>
                                <th class="table-type">是否置底</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($themes as $theme)
                                <tr>
                                    <td>{{ $theme->id }}</td>
                                    <td>{{ $theme->name }}</td>
                                    <td>
                                        <img src="{{ $theme->image }}" class="thumb">
                                    </td>
                                    @foreach (array('is_left', 'is_right', 'is_bottom') as $attr)
                                        <td class="am-hide-sm-only">
                                            {!! is_something($attr, $theme) !!}
                                        </td>
                                    @endforeach

                                    <td>
                                        <a href="{{ route('admin.themes.edit', $theme->id) }}">编辑</a>
                                        <div class="divider divider-vertical"></div>
                                        <a href="{{ route('admin.themes.destroy', $theme->id) }}" data-method="delete"
                                           data-token="{{csrf_token()}}" data-confirm="确认删除吗?">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="am-cf">
                            共 {{ $themes->total() }} 条记录
                            <div class="am-fr">
                                {!! $themes->appends(Request::all())->links() !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
