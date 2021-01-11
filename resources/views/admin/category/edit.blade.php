@extends('layouts.admin.app')

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="/admin/categories">首页</a></li>
                <li>编辑分类</li>
            </ol>
        </div>

        @include('layouts.admin.shared._flash')

        <div class="page-body">
            <form class="am-form am-form-horizontal" action="{{ route('admin.categories.update',  $category->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="am-tabs am-margin">
                    <div class="am-form-group">
                        <label for="name" class="am-u-sm-12 am-u-md-3 am-form-label">上级分类</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <select
                                data-am-selected="{btnWidth: '100%', btnSize: 'sm', maxHeight: 360, searchBox: 1}"
                                name="parent_id">
                                <option value="0">顶级分类</option>
                                @foreach ($categories as $cate)
                                    <option value="{{ $cate->id }}"
                                            @if($category->parent_id == $cate->id) selected @endif>
                                        {!! indent_category($cate->count) !!}{{ $cate->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="name" class="am-u-sm-12 am-u-md-3 am-form-label">名称</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <input type="text" name="name" value="{{ $category->name }}">
                        </div>
                    </div>

                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-12 am-u-md-3 am-form-label">
                            缩略图
                        </div>

                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <div class="am-form-group am-form-file">
                                <button type="button" class="am-btn am-btn-success am-btn-sm">
                                    <i class="am-icon-cloud-upload" id="loading"></i> 上传缩略图
                                </button>
                                <span style="margin-left: 50px;color: #f4645f;">* 请上传宽高：112 * 113 的图片</span>
                                <input type="file" id="image_upload">
                                <input type="hidden" name="image" value="{{ $category->image }}">
                            </div>

                            <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed am-no-layout">

                            <div>
                                <img src="{{ $category->image }}" id="img_show"
                                     style="max-height: 150px;margin-bottom: 10px;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="am-form-group">
                    <div class="am-u-sm-12 am-u-md-9 am-u-md-offset-3">
                        <button type="button" onclick="location.href='/admin/categories'" class="am-btn am-btn-default am-btn-sm am-radius">返 回</button>
                        <button type="submit" class="am-btn am-btn-primary am-btn-sm am-radius">保 存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="/vendor/html5-fileupload/jquery.html5-fileupload.js"></script>
    <script src="/js/upload.js"></script>
@endsection
