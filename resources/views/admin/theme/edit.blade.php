@extends('layouts.admin.app')

@section('content')
    <div class="admin-content-body">
        <div class="page-header">
            <ol class="am-breadcrumb am-breadcrumb-slash">
                <li><a href="/admin/themes">首页</a></li>
                <li>编辑主题</li>
            </ol>
        </div>

        <div class="page-body">

            @include('layouts.admin.shared._flash')

            <form class="am-form am-form-horizontal" action="{{ route('admin.themes.update', $theme->id) }}"
                  method="post">
                @csrf
                @method('PUT')
                <div class="am-tabs am-margin">
                    <div class="am-form-group">
                        <label for="sort" class="am-u-sm-12 am-u-md-3 am-form-label">主题名称</label>
                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <input type="text" name="name" placeholder="输入主题名称" value="{{ $theme->name }}">
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
                                <span style="margin-left: 50px;color: #f4645f;">缩略图宽高：159 * 206</span>
                                <input type="file" id="image_upload">
                                <input type="hidden" name="image" value="{{ $theme->image }}">
                            </div>

                            <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed am-no-layout">

                            <div>
                                <img src="{{ $theme->image }}" id="img_show"
                                     style="max-height: 150px;margin-bottom: 10px;">
                            </div>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label class="am-u-sm-12 am-u-md-3 am-form-label">是否置左</label>

                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <label class="am-radio-inline">
                                <input type="radio" value="1" name="is_left" @if($theme->is_left == 1) checked @endif> 是
                            </label>
                            <label class="am-radio-inline">
                                <input type="radio" value="0" name="is_left"  @if($theme->is_left == 0) checked @endif> 否
                            </label>
                            <span style="margin-left:80px;color: #f4645f;">选中后显示在商城最左边的图片</span>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label class="am-u-sm-12 am-u-md-3 am-form-label">是否置右</label>

                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <label class="am-radio-inline">
                                <input type="radio" value="1" name="is_right" @if($theme->is_right == 1) checked @endif> 是
                            </label>
                            <label class="am-radio-inline">
                                <input type="radio" value="0" name="is_right" @if($theme->is_right == 0) checked @endif> 否
                            </label>
                            <span style="margin-left:80px;color: #f4645f;">选中后显示在商城最右边的图片</span>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label class="am-u-sm-12 am-u-md-3 am-form-label">是否置底</label>

                        <div class="am-u-sm-12 am-u-md-5 am-u-end">
                            <label class="am-radio-inline">
                                <input type="radio" value="1" name="is_bottom" @if($theme->is_bottom == 1) checked @endif> 是
                            </label>
                            <label class="am-radio-inline">
                                <input type="radio" value="0" name="is_bottom" @if($theme->is_bottom == 0) checked @endif> 否
                            </label>
                            <span style="margin-left:80px;color: #f4645f;">选中后显示在商城最底部的图片</span>
                        </div>
                    </div>
                </div>

                <div class="am-form-group">
                    <div class="am-u-sm-12 am-u-md-9 am-u-md-offset-3">
                        <button type="button" onclick="location.href='/admin/themes'"
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
    <script src="/vendor/html5-fileupload/jquery.html5-fileupload.js"></script>
    <script src="/js/upload.js"></script>
@endsection
