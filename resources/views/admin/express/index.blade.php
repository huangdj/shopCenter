@extends('layouts.admin.app')

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="/admin">首页</a></li>
                <li>物流列表</li>
            </ol>
        </div>

        @include('layouts.admin.shared._flash')

        <div class="page-body">
            <div class="am-g">
                <div class="am-u-sm-12">
                    <div class="am-btn-toolbar">
                        <div class="">
                            <button type="button" class="am-btn am-btn-primary"
                                    onclick="location.href='/admin/express/create'"><span class="am-icon-plus"></span>
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
                                <th class="table-title">物流名称</th>
                                <th class="table-title">运费 / 满额包邮</th>
                                <th class="table-type">是否可用</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($expresses as $express)
                                <tr data-id="{{ $express->id }}">
                                    <td>{{ $express->id }}</td>
                                    <td><a href="{{ $express->url }}" target="">{{ $express->name }}</a></td>
                                    <td>{{ $express->shipping_money }} / {{ $express->shipping_free }}</td>
                                    <td>
                                        @if($express->is_enable == 1)
                                            <span class="am-icon-check is_something" data-attr="is_enable"></span>
                                        @else
                                            <span class="am-icon-close is_something" data-attr="is_enable"></span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.express.edit', $express->id) }}">编辑</a>
                                        <div class="divider divider-vertical"></div>
                                        <a href="{{ route('admin.express.destroy', $express->id) }}"
                                           data-method="delete"
                                           data-token="{{csrf_token()}}" data-confirm="确认删除吗?">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="am-cf">
                            共 {{ $expresses->total() }} 条记录
                            <div class="am-fr">
                                {!! $expresses->appends(Request::all())->links() !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $(function () {
            //是否...
            $(".is_something").click(function () {
                var _this = $(this);
                var data = {
                    id: _this.parents("tr").data('id'),
                    attr: _this.data('attr')
                }

                $.ajax({
                    type: "PATCH",
                    url: "/admin/express/is_something",
                    data: data,
                    success: function (data) {
                        if (data.status == 0) {
                            alert(data.msg);
                            return false;
                        }
                        _this.toggleClass('am-icon-close am-icon-check');
                    }
                });
            });
        });
    </script>
@endsection
