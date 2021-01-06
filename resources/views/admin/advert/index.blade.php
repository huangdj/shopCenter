@extends('layouts.admin.app')

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="/admin">首页</a></li>
                <li>广告列表</li>
            </ol>
        </div>

        <div class="page-body">
            <div class="am-g">
                <form action="" class="am-form am-form-horizontal">
                    <div class="am-u-sm-12 am-u-md-4">
                        <div class="am-form-group">
                            <label for="category_id" class="am-u-sm-3 am-form-label">按类型</label>
                            <div class="am-u-sm-9">
                                <select name="type" id="change_type"
                                        data-am-selected="{btnWidth: '80%',  btnStyle: 'secondary', btnSize: 'sm', maxHeight: 360}">
                                    <option value="-1">所有类型</option>
                                    <option value="1" @if(Request::input('type') == 1) selected @endif>首页轮播图</option>
                                    <option value="2" @if(Request::input('type') == 2) selected @endif>中间广告图</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <div class="am-btn-toolbar">
                        <div class="">
                            <button type="button" class="am-btn am-btn-primary"
                                    onclick="location.href='/admin/adverts/create'"><span class="am-icon-plus"></span>
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
                                <th class="table-title">缩略图</th>
                                <th class="table-type">类型</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($adverts as $advert)
                                <tr>
                                    <td>{{ $advert->id }}</td>
                                    <td>
                                        <img src="{{ $advert->image }}" class="thumb">
                                    </td>
                                    <td>
                                        @if($advert->type == 1)
                                            <a href="javascript:;">首页轮播图</a>
                                        @else
                                            <a href="javascript:;">中间广告图</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.adverts.edit', $advert->id) }}">编辑</a>
                                        <div class="divider divider-vertical"></div>
                                        <a href="{{ route('admin.adverts.destroy', $advert->id) }}" data-method="delete"
                                           data-token="{{csrf_token()}}" data-confirm="确认删除吗?">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(function () {
            $("#change_type").change(function () {
                var type = $(this).val();
                if (type == "-1") {
                    location.href = "/admin/adverts";
                    return false;
                }
                var url = "/admin/adverts?type=" + type;
                location.href = url;
            })
        })
    </script>
@endsection
