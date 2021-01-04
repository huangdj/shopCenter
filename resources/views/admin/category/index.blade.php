@extends('layouts.admin.app')

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li class="am-active"><a href="/admin">首页</a></li>
                <li>所有分类</li>
            </ol>
        </div>

        <div class="page-body">
            <div class="am-g">
                <div class="am-u-sm-12">
                    <div class="am-btn-toolbar">
                        <div class="">
                            <button type="button" onclick="location.href='/admin/categories/create'" class="am-btn am-btn-primary"><span class="am-icon-plus"></span>
                                新增
                            </button>
                            <button type="button" class="am-btn am-btn-success" id="show_all">
                                <span class="am-icon-arrows-alt"></span> 展开所有
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
                                <th class="table-id">ID</th>
                                <th class="table-type">缩略图</th>
                                <th class="table-type" style="width: 30%;">分类名</th>
                                <th style="width: 20%;">分类商品</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $category)
                                <tr data-id="{{$category->id}}" id="row_{{$category->id}}" class="xParent">
                                    <td>{{$category->id}}</td>
                                    <td></td>
                                    <td>{{$category->name}}</td>
                                    <td class="am-hide-sm-only"></td>
                                    <td>
                                        <a href="{{route('admin.categories.edit', $category->id)}}">编辑</a>
                                        <div class="divider divider-vertical"></div>
                                        <a href="{{route('admin.categories.destroy', $category->id)}}" data-method="delete"
                                           data-token="{{csrf_token()}}" data-confirm="确认删除吗?">删除</a>
                                    </td>
                                </tr>

                                @foreach($category->children as $child)
                                    <tr data-id="{{$child->id}}" class="xChildren child_row_{{$category->id}}">
                                        <td>{{$child->id}}</td>
                                        <td>
                                            <img src="{{$child->image}}" alt="" style="width: 80px;height: 60px;">
                                        </td>
                                        <td>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$child->name}}
                                        </td>
                                        <td class="am-hide-sm-only">查看商品</td>
                                        <td>
                                            <a href="{{route('admin.categories.edit', $child->id)}}">编辑</a>
                                            <div class="divider divider-vertical"></div>
                                            <a href="{{route('admin.categories.destroy', $child->id)}}" data-method="delete"
                                               data-token="{{csrf_token()}}" data-confirm="确认删除吗?">删除</a>
                                        </td>
                                    </tr>
                                @endforeach
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
            //展开与折叠表格
            $("tr.xParent").dblclick(function () {
                $(this).toggleClass('am-active');
                $(".child_" + this.id).toggle();
            });

            $("#show_all").click(function () {
                $("tr.xParent").toggleClass('am-active');
                $("tr.xChildren").toggle();
            });
        })
    </script>
@stop


