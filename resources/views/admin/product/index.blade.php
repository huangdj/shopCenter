@extends('layouts.admin.app')

@section('css')
    <link rel="stylesheet" href="/vendor/daterangepicker/daterangepicker.css">
@endsection

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="/admin">首页</a></li>
                <li>所有商品</li>
            </ol>
        </div>

        <div class="page-body">
            <div class="am-g">
                <form class="am-form am-form-horizontal" method="get">
                    <div class="am-u-sm-12 am-u-md-3">
                        <div class="am-form-group">
                            <label for="title" class="am-u-sm-3 am-form-label">名称</label>
                            <div class="am-u-sm-9">
                                <input type="text" name="name" placeholder="请输入名称" value="{{ Request::input('name') }}">
                            </div>
                        </div>
                    </div>

                    <div class="am-u-sm-12 am-u-md-3">
                        <div class="am-form-group">
                            <label for="category_id" class="am-u-sm-3 am-form-label">分类</label>
                            <div class="am-u-sm-9">
                                <select name="category_id" data-am-selected="{btnWidth: '100%', btnSize: 'sm'}">
                                    <optgroup label="请选择">
                                        <option value="-1">所有分类</option>
                                    </optgroup>

                                    @foreach ($filter_categories as $category)
                                        <optgroup label="{{$category->name}}">
                                            @foreach ($category->children as $c)
                                                <option value="{{$c->id}}"
                                                        @if($c->id == Request::input('category_id')) selected @endif>
                                                    {{$c->name}}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="am-u-sm-12 am-u-md-3">
                        <div class="am-form-group">
                            <label for="category_id" class="am-u-sm-3 am-form-label">日期</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="created_at" placeholder="选择时间日期" name="created_at"
                                       value="{{ Request::input('created_at') }}" class="am-form-field am-input-sm"/>
                            </div>
                        </div>
                    </div>

                    <div class="am-u-sm-12 am-u-md-3">
                        <div class="am-form-group search-buttons">
                            <button class="am-btn am-btn-primary" type="submit">查 询</button>
                            <button class="am-btn am-btn-default" type="button"
                                    onclick="location.href='/admin/products'">重 置
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
                                    onclick="location.href='/admin/products/create'"><span class="am-icon-plus"></span>
                                新增
                            </button>
                            <button type="button" class="am-btn am-btn-default">
                                <span class="am-icon-trash-o"></span> 删除
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            @include('layouts.admin.shared._flash')

            <div class="am-g am-g-collapse">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-check"><input type="checkbox"/></th>
                                <th class="table-id">ID</th>
                                <th class="table-title">缩略图</th>
                                <th class="table-type">商品名称</th>
                                <th class="table-type">所属分类</th>
                                <th class="table-type">售价</th>
                                <th class="table-type">原价</th>
                                <th class="am-hide-sm-only">上架</th>
                                <th class="am-hide-sm-only">置顶</th>
                                <th class="am-hide-sm-only">推荐</th>
                                <th class="am-hide-sm-only">热销</th>
                                <th class="am-hide-sm-only">新品</th>
                                <th class="am-hide-sm-only">有效期</th>
                                <th class="am-hide-sm-only" style="width:6%">库存</th>
                                <th class="table-date am-hide-sm-only">上架日期</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $product)
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        <img src="{{ $product->image }}" alt="" class="thumb">
                                    </td>
                                    <td>{{ sub($product->name, 10) }}</td>
                                    <td class="am-hide-sm-only">{{ $product->categories->implode('name', ', ') }}</td>
                                    <td class="am-hide-sm-only">{{ $product->price }}</td>
                                    <td class="am-hide-sm-only">{{ $product->original_price }}</td>
                                    @foreach (array('is_onsale', 'is_top', 'is_recommend', 'is_hot', 'is_new') as $attr)
                                        <td class="am-hide-sm-only">
                                            {!! is_something($attr, $product) !!}
                                        </td>
                                    @endforeach
                                    <td>{{ $product->expired_at }}</td>
                                    <td class="am-hide-sm-only">
                                        <input type="text" name="stock" class="am-input-sm" value="{{$product->stock}}">
                                    </td>
                                    <td class="am-hide-sm-only">
                                        {{$product->created_at->format("Y-m-d H:i")}}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.products.edit', $product->id)}}">编辑</a>
                                        <div class="divider divider-vertical"></div>
                                        <a href="{{route('admin.products.destroy', $product->id)}}" data-method="delete"
                                           data-token="{{csrf_token()}}" data-confirm="确认删除吗?">删除</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="am-cf">
                            共 {{ $products->total() }} 条记录
                            <div class="am-fr">
                                {!! $products->appends(Request::all())->links() !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="/vendor/daterangepicker/moment.js"></script>
    <script src="/vendor/moment/locale/zh-cn.js"></script>
    <script src="/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="/js/daterange_config.js"></script>
@stop
